<?php

namespace App\Livewire;

use App\Models\Mentor;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class DashboardMentorManager extends Component
{
    use WithPagination;

    public $mentorId, $nama, $gender = 'Laki-laki', $nip, $alamat, $kontak, $email;
    public $isOpen = false;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'gender' => 'required|in:Laki-laki,Perempuan',
        'nip' => 'required|unique:guru,nip',
        'alamat' => 'required|string|max:255',
        'kontak' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:guru,email', // unique:mentors to match the table name
    ];

    public function openModal()
    {
        $this->reset(['nama', 'gender', 'nip', 'alamat', 'kontak', 'email']);
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function save()
    {
        $this->validate();

        Mentor::create([
            'nama' => $this->nama,
            'gender' => $this->gender,
            'nip' => $this->nip,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Data mentor berhasil disimpan.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.dashboard-mentor-manager', [
            'mentors' => Mentor::paginate(10),
        ]);
    }
}
