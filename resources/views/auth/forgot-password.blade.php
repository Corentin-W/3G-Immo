@extends('base')
@section('content')

<div class="form__container">
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Vous avez oublié votre mot de passe ? Notre serveur d\'envoi de nouveau mot de passe est en cours de maintenance. Veuillez nous envoyer un mail à "contact@3g-immo.fr" et nous reviendrons vers vous au plus vite avec une solution. Pour toute demande urgente merci de nous contacer au 04 50 45 82 47. Merci et à bientôt.') }}
            </div>

            </form>
        </x-auth-card>
    </x-guest-layout>
</div>

@endsection
