<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Student;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $showRegisterForm = true;

    public function register()
    {
        $this->resetErrorBag();

        try {
            $validated = $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::exists('siswa', 'email')->whereNull('users_id'),],
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            ], [
                'email.exists' => 'Email ini tidak terdaftar sebagai siswa.',
                'email.unique' => 'Email ini sudah digunakan.',
                'name.required' => 'Nama wajib diisi.',
                'password.required' => 'Password wajib diisi.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
            ]);

            $validated['password'] = Hash::make($validated['password']);
            $user = User::create($validated);
            $user->assignRole('Student');

            // Update users_id di student
            $student = Student::where('email', $user->email)
                ->whereNull('users_id')
                ->first();

            if ($student) {
                $student->users_id = $user->id;
                $student->save();
            }

            event(new Registered($user));
            Auth::login($user);

            $this->redirect(route('dashboard'), navigate: true);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->showRegisterForm = true;
            throw $e;
        }
    }
}
