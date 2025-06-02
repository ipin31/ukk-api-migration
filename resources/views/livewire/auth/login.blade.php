<div class="wrapper">
    <div class="form_container">


    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

        {{-- LOGIN FORM --}}
        <div class="form_box login">
            <h2>Login</h2>
            <form wire:submit.prevent="login">
                <div class="input_box">
                    <input type="email" placeholder="Email" wire:model="email" required>
                    <i class="fas fa-user"></i>
                </div>

                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror

                <div class="input_box" style="position: relative;">
                    <input type="password" placeholder="Password" wire:model="password" required id="loginPassword" style="padding-right: 30px;">
                    <i class="fas fa-lock" ></i>
                    <i id="toggleLoginPassword" class="fas fa-eye togglePasswordBtn" data-target="loginPassword"></i>
                </div>

                @error('password')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror

                <div class="forgot_link">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    @endif
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" wire:model="remember">
                        Remember me
                    </label>
                </div>

                <button type="submit">Login</button>
            </form>
        </div>

        {{-- TOGGLE PANEL --}}
        <div class="toggle_box">
            <div class="toggle_panel toggle_left">
                <a href="{{ route('home') }}" class="flex flex-col items-center font-medium" wire:navigate>
                    <span class="flex h-auto w-auto items-center justify-center rounded-md mb-4">
                        <x-app-logo-icon class="h-28 w-auto fill-current text-black dark:text-white" />
                    </span>
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <h2>Hello, Welcome!</h2>
                <p>Don't have an account?</p>
                <a href="{{ route('register') }}" class="register_btn">Register</a>
            </div>
        </div>
    </div>
<script src="{{ asset('js/script.js') }}"></script>
</div>