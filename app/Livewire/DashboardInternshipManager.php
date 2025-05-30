<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Internship;
use App\Models\Student;
use App\Models\Company;
use Carbon\Carbon;

class DashboardInternshipManager extends Component
{
    use WithPagination;

    public $mulai, $selesai, $siswa_id, $students;
    public $isOpen = false;
    public $internshipId;

    public $industri_id;
    public $company;
    public $userHasInternship = false;

    protected $rules = [
        'mulai' => 'required|date',
        'selesai' => 'required|date|after:mulai',
        'siswa_id' => 'required|exists:siswa,id',
        'industri_id' => 'required|exists:industri,id',
    ];

    protected $messages = [
        'mulai.required' => 'Tanggal mulai wajib diisi.',
        'selesai.required' => 'Tanggal selesai wajib diisi.',
        'selesai.after' => 'Tanggal selesai harus setelah tanggal mulai.',
        'industri_id.required' => 'Silahkan pilih industri.',
    ];
    public function mount()
    {
        $siswa = Student::where('email', auth()->user()->email)->first();

        if ($siswa) {
            $this->siswa_id = $siswa->id;
            $this->userHasInternship = Internship::where('siswa_id', $siswa->id)->exists();
            $this->loadStudents($siswa);
        } else {
            $this->students = collect();
            $this->userHasInternship = false;
        }
        $this->company = Company::all();
    }

    public function loadStudents($siswa = null)
    {
        $this->students = $siswa ? collect([$siswa]) : Student::all();
    }

    public function openModal($internshipId = null)
    {
        $this->resetErrorBag();
        $this->reset(['mulai', 'selesai', 'internshipId']);

        if ($internshipId) {
            $internship = Internship::findOrFail($internshipId);
            $this->internshipId = $internship->id;
            $this->mulai = $internship->mulai;
            $this->selesai = $internship->selesai;
            $this->siswa_id = $internship->siswa_id;
            $this->industri_id = $internship->industri_id;
        }

        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->reset(['mulai', 'selesai', 'siswa_id', 'internshipId']);
        $this->isOpen = false;
    }

    public function save()
    {
        $this->validate();

        $userEmail = auth()->user()->email;

        $siswa = Student::where('email', $userEmail)->first();
        if (!$siswa) {
            session()->flash('error', 'Siswa tidak ditemukan.');
            return;
        }

        // Validasi durasi minimal 90 hari
        $durasiHari = Carbon::parse($this->mulai)->diffInDays(Carbon::parse($this->selesai));
        if ($durasiHari < 90) {
            $this->addError('selesai', 'Durasi PKL minimal harus 90 hari.');
            return;
        }

        // Cegah jika user mencoba menambahkan data baru padahal sudah ada
        if (!$this->internshipId) {
            $sudahAda = Internship::whereHas('student', function ($query) use ($userEmail) {
                $query->where('email', $userEmail);
            })->exists();

            if ($sudahAda) {
                session()->flash('error', 'Anda sudah mengisi data PKL.');
                return;
            }
        }

        $data = [
            'mulai' => $this->mulai,
            'selesai' => $this->selesai,
            'siswa_id' => $siswa->id,
            'industri_id' => $this->industri_id,
        ];

        if ($this->internshipId) {
            $internship = Internship::findOrFail($this->internshipId);

            if (auth()->user()->hasRole('student') && $internship->siswa_id != $siswa->id) {
                abort(403);
            }

            $internship->update($data);
        } else {
            Internship::create($data);
        }

        $this->userHasInternship = true;

        session()->flash('success_internship', 'Laporan PKL berhasil disimpan.');
        $this->closeModal();

        return $this->redirect('/dashboard');
    }

    public function delete($id)
    {
        $internship = Internship::findOrFail($id);

        if (
            auth()->user()->hasRole('student') &&
            $internship->siswa_id != auth()->user()->student->id
        ) {
            abort(403);
        }

        $this->userHasInternship = false;
        $internship->delete();
        session()->flash('success', 'Data magang berhasil dihapus.');
    }

    public function getUserHasInternshipProperty()
    {
        $siswa = auth()->user()->student;
        if (!$siswa)
            return false;

        return Internship::where('siswa_id', $siswa->id)->exists();
    }

    public function render()
    {
        $user = auth()->user();
        $student = Student::where('email', $user->email)->first();

        $internships = collect();
        $this->userHasInternship = false;

        if ($student) {
            $internships = Internship::where('siswa_id', $student->id)
                ->get()
                ->map(function ($internship) {
                    $mulai = Carbon::parse($internship->mulai);
                    $selesai = Carbon::parse($internship->selesai);
                    $durasi = $mulai->diffInDays($selesai);
                    $internship->durasi_hari = $durasi;
                    $internship->durasi_valid = $durasi >= 90;
                    return $internship;
                });
            $this->userHasInternship = $internships->isNotEmpty();
        }

        return view('livewire.dashboard-internship-manager', [
            'internships' => $internships,
            'students' => collect([$student])->filter(),
            'userHasInternship' => $this->userHasInternship,
        ]);
    }
}
