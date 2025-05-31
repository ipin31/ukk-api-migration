<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class DashboardStudentManager extends Component
{
    use WithPagination;

    public $nama, $nis, $gender = 'Laki-laki', $alamat, $kontak, $email, $status_pkl;
    public $isOpen = false;
    public $studentId;

    public $users_id;

    public function mount()
    {
        // Jika user punya role dan bukan salah satu dari yang diizinkan, tolak akses
        if (auth()->user()->getRoleNames()->isNotEmpty() && !auth()->user()->hasAnyRole(['Student', 'Teacher', 'super_admin'])) {
            abort(403, 'Kamu tidak diizinkan mengakses halaman ini.');
        }
        // Jika user tidak punya role sama sekali (kosong), tetap bisa akses
    }
    protected $rules = [
        'nama' => 'required|string|max:255',
        'nis' => 'required|unique:siswa,nis', // Ganti 'students' menjadi 'siswa'
        'gender' => 'required|in:Laki-laki,Perempuan',
        'alamat' => 'required|string|max:255',
        'kontak' => 'required|string|max:255',
        'email' => 'required|email|unique:siswa,email', // Ganti 'students' menjadi 'siswa'
        'users_id' => 'required|exists:users,id',
        'foto' => 'nullable|image|max:2048',
    ];

    public function openModal()
    {
        $this->reset(['nama', 'nis', 'gender', 'alamat', 'kontak', 'email', 'status_pkl', 'foto']);
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function save()
    {
        $this->validate();

        Student::create([
            'nama' => $this->nama,
            'nis' => $this->nis,
            'gender' => $this->gender,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
            'email' => $this->email,
            'status_pkl' => $this->status_pkl ?? false,
            'users_id' => auth()->id(),
            'foto' => $this->foto ? $this->foto->store('photos', 'public') : null,
        ]);

        session()->flash('success', 'Data siswa berhasil disimpan.');
        $this->closeModal();
    }

    public function render()
    {
        $student = auth()->user()->student;

        return view('livewire.dashboard-student-manager', [
            'student' => $student, // kirim variabel student ke view
        ]);
    }
}

