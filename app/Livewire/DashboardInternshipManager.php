<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Internship;
use App\Models\Student;

class DashboardInternshipManager extends Component
{
    use WithPagination;

    public $mulai, $selesai, $siswa_id, $students;
    public $isOpen = false;
    public $internshipId;


    protected $rules = [
        'mulai' => 'required|date',
        'selesai' => 'required|date|after:mulai',
        'siswa_id' => 'required|exists:siswa,id',
    ];

    public function mount()
    {
        $siswa = Student::where('email', auth()->user()->email)->first();

        if ($siswa) {
            $this->siswa_id = $siswa->id;
            $this->userHasInternship = Internship::where('siswa_id', $siswa->id)->exists();
            $this->loadStudents($siswa);
        } else {
            $this->students = collect(); // kosongkan jika siswa tidak ditemukan
        }
    }

    public function loadStudents($siswa = null)
    {
        $this->students = $siswa ? collect([$siswa]) : Student::all();
    }

    public function openModal($internshipId = null)
    {
        $this->resetErrorBag(); // penting untuk validasi Livewire
        $this->reset(['mulai', 'selesai', 'internshipId']);

        if ($internshipId) {
            $internship = Internship::findOrFail($internshipId);
            $this->internshipId = $internship->id;
            $this->mulai = $internship->mulai;
            $this->selesai = $internship->selesai;
            $this->siswa_id = $internship->siswa_id;
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

        // Ambil ulang data siswa untuk amankan manipulasi data
        $siswa = Student::where('email', auth()->user()->email)->first();
        if (!$siswa) {
            session()->flash('error', 'Siswa tidak ditemukan.');
            return;
        }

        $this->siswa_id = $siswa->id;

        // Cek jika student hanya boleh buat 1 data
        if (!$this->internshipId && auth()->user()->hasRole('student')) {
            $exists = Internship::where('siswa_id', $this->siswa_id)->exists();
            if ($exists) {
                session()->flash('error', 'Anda sudah pernah mengisi data PKL.');
                return;
            }
        }

        if ($this->internshipId) {
            $internship = Internship::findOrFail($this->internshipId);

            if (auth()->user()->hasRole('student') && $internship->siswa_id != $siswa->id) {
                abort(403);
            }

            $internship->update([
                'mulai' => $this->mulai,
                'selesai' => $this->selesai,
                'siswa_id' => $this->siswa_id,
            ]);
        } else {
            Internship::create([
                'mulai' => $this->mulai,
                'selesai' => $this->selesai,
                'siswa_id' => $this->siswa_id,
            ]);
        }

        if (!$this->internshipId && auth()->user()->hasRole('student')) {
            if ($this->userHasInternship) {
                session()->flash('error', 'Anda sudah pernah mengisi data PKL.');
                return;
            }
        }

        // $this->userHasInternship = Internship::where('siswa_id', $siswa->id)->exists();
        $this->userHasInternship = true;

        session()->flash('success', 'Data magang berhasil disimpan.');
        $this->closeModal();
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
        $query = Internship::query();

        if (auth()->user()->hasRole('student') && auth()->user()->student) {
            $query->where('siswa_id', auth()->user()->student->id);
        }

        return view('livewire.dashboard-internship-manager', [
            'internships' => $query->latest()->paginate(10),
            'students' => $this->students,
            'userHasInternship' => $this->userHasInternship,
        ]);
    }
}
