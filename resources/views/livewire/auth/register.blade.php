<div class="wrapper">
    <div class="form_container">

        <!-- CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

        {{-- REGISTER FORM --}}
        <div class="form_box register">
            <h2>Register</h2>
            <form wire:submit.prevent="register">
                <div class="input_box">
                    <input type="text" placeholder="Username" wire:model="name" required>
                    <i class="fas fa-user"></i>
                </div>
                @error('name')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror

                <div class="input_box">
                    <input type="email" placeholder="Email" wire:model="email" required>
                    <i class="fas fa-envelope"></i>
                </div>
                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror

                <div class="input_box" style="position: relative;">
                    <input type="password" placeholder="Password" id="registerPassword" wire:model="password" required
                        style="padding-right: 40px;">
                    <i class="fas fa-lock"></i>
                    <i class="fas fa-eye togglePasswordBtn" data-target="registerPassword"
                        ></i>
                </div>
                @error('password')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror

                <div class="input_box" style="position: relative;">
                    <input type="password" placeholder="Confirm Password" id="registerConfirmPassword"
                        wire:model="password_confirmation" required style="padding-right: 40px;">
                    <i class="fas fa-lock"></i>
                    <i class="fas fa-eye togglePasswordBtn" data-target="registerConfirmPassword"
                        ></i>
                </div>

                <button type="submit">Register</button>
            </form>
        </div>

        {{-- TOGGLE PANEL --}}
        <div class="toggle_box">
            <div class="toggle_panel toggle_right">
                <a href="{{ route('home') }}" class="flex flex-col items-center font-medium" wire:navigate>
                    <span class="flex h-auto w-auto items-center justify-center rounded-md mb-4">
                        <x-app-logo-icon class="h-28 w-auto fill-current text-black dark:text-white" />
                    </span>
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <h2>Welcome Back!</h2>
                <p>Already have an account?</p>
                <a href="{{ route('login') }}" class="login_btn">Login</a>
            </div>
        </div>

    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</div>