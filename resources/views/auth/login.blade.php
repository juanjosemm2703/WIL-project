<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />
    <div class="container">
        <h1>Welcome back!</h1>
        <p>Enter your email and password to log in to WIL panel</p>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class= "container form">
        <!-- Email Address -->
        <div class= "container">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" placeholder="example@griffithuni.edu.au"  type="email" name="email" :value="old('email')"  autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <!-- Password -->
        <div class="container">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" 
                            type="password"
                            name="password"
                            placeholder="Your password" autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Remember Me -->
        <div class="container ">
            <label for="remember_me" class="checkbox">
                <input id="remember_me" type="checkbox" name="remember">
                <span>{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="container ">
            <x-primary-button >
                {{ __('Log in') }}
            </x-primary-button>
                @if (Route::has('register'))
                <div class="container row">
                <p>Don't have account yet? </p>
                <a href="{{ route('register') }}">
                    {{ __('Sign Up') }}
                </a>
                </div>
                @endif
        </div>
        </div>
    </form>
</x-guest-layout>
