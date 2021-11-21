@extends('base')
@section('content')

<div class="form__container">
    <x-guest-layout>
        <x-auth-card >

            <!-- Session Status -->
            <x-auth-session-status :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="">
                    <x-label for="password" :value="__('Mot de passe')" />
                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span class="">{{ __('Se souvenir de moi') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif

                    <x-button class="">
                        {{ __('Se connecter') }}
                    </x-button>

                </div>
                <br>
                <a class="" href="{{ route('register') }}">
                    {{ __('Créer un compte') }}
                </a>
            </form>
        </x-auth-card>
    </x-guest-layout>
</div>
@endsection
