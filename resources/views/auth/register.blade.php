<x-guest-layout>
    <div class="container">
        <h1>Sign up</h1>
        <p>Register to log in to WIL panel</p>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class= "container form">
        <!-- Name -->
        <div class= "container ">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" placeholder="Your name"  type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')"/>
        </div>

        <!-- Email Address -->
        <div class= "container ">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" placeholder="example@griffithuni.edu.au" type="email" name="email" :value="old('email')"  autocomplete="username" />
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <!-- Password -->
        <div class= "container ">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"
                            type="password"
                            name="password"
                             autocomplete="new-password" placeholder="Your password" />

            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
       <div class= "container ">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation"
                            type="password"
                            name="password_confirmation"  autocomplete="new-password" placeholder="Repeat" />

            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <!-- Select type -->
       <div class= "container ">
            <x-input-label for="type" :value="__('Account Type')" />
            <x-select-input id="type" name="type"  :roles="['Student', 'Industry Partner']"/>
            <x-input-error :messages="$errors->get('type')" />
        </div>

        <div class= "container ">
            <x-primary-button >
                {{ __('Register') }}
            </x-primary-button>

            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>   
        </div>
        <div>
    </form>
</x-guest-layout>
