@extends('base')
@section('content')

<x-guest-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="">
                <label for="remember_me" class="">
                    <input id="remember_me" type="checkbox" class="" name="remember">
                    <span class="">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="">
                @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection
