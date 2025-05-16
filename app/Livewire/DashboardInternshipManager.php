<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Internship;
use App\Models\Student;

class DashboardInternshipManager extends Component
{
    use WithPagination;

    public $mulai, $selesai, $siswa_id;
    public $isOpen = false;
    public $internshipId;

    // Validation rules
    protected $rules = [
        'mulai' => 'required|date',
        'selesai' => 'required|date|after:mulai',
        'siswa_id' => 'required|exists:siswa,id',
    ];

    public function openModal($internshipId = null)
    {
        $this->reset(['mulai', 'selesai', 'siswa_id']);
        if ($internshipId) {
            $internship = Internship::find($internshipId);
            $this->internshipId = $internship->id;
            $this->mulai = $internship->mulai;
            $this->selesai = $internship->selesai;
            $this->siswa_id = $internship->siswa_id;
        }
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->reset(['mulai', 'selesai', 'siswa_id']);
        $this->isOpen = false;
    }

    public function save()
    {
        $this->validate();

        if ($this->internshipId) {
            $internship = Internship::find($this->internshipId);
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

        session()->flash('success', 'Data magang berhasil disimpan.');
        $this->closeModal();
    }

    public function delete($id)
    {
        $internship = Internship::find($id);
        if ($internship) {
            $internship->delete();
            session()->flash('success', 'Data magang berhasil dihapus.');
        }
    }

    public function render()
    {
        $students = Student::all();
        $internships = Internship::paginate(10);

        return view('livewire.dashboard-internship-manager', [
            'internships' => $internships,
            'students' => $students,
        ]);
    }
}
