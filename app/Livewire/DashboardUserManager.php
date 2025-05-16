<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class DashboardUserManager extends Component
{
    use WithPagination;


    public $name, $email, $password, $role;
    public $isOpen = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'role' => 'required|exists:roles,name',
    ];

    public function openModal()
    {
        $this->reset(['name', 'email', 'password', 'role']);
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function save()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->syncRoles([$this->role]);

        session()->flash('success', 'User berhasil dibuat.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.dashboard-user-manager', [
            'users' => User::with('roles')->paginate(10),
            'roles' => Role::pluck('name'),
        ]);
    }
}
