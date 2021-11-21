@extends('base')
@section('content')

<div class="body">
    <div class="header">
        <div class="item">
            <div class="item__body">
                <div class="item__title">
                    <h5 class="card-title">Réf: {{$annonce->ref_annonce}}</h5>
                </div>
                <div class="item__description">
                    <p>Epagny</p>
                    <p><em>Haute-Savoie</em></p>
                    <p class="card-text">Pirx: {{$annonce->prix_annonce}}€</p>
                    <p class="card-text">Surface habitable: {{$annonce->surface_habitable}}</p>
                    <p class="card-text">Nombre de pièces: {{$annonce->nombre_de_piece}}</p>
                </div>
                <div class="item__buttons">
                    <a href="{{route('agent-detail', $annonce->agent->id)}}" class="btn btn-secondary">{{$annonce->agent->prenom_agent}} {{$annonce->agent->nom_agent}}</a>
                    <a href="{{route('browse')}}" class="btn btn-primary back__menu">Retour au menu</a>
                </div>
            </div>
        </div>
    </div>

    <main class="caroussel">
        <div class="container">
            <button id="left-btn"><i class="arrow"></i></button>
            <img id="carousel" src="" alt="">
            <button id="right-btn"><i class="arrow"></i></button>
        </div>
    </main>
</div>
@endsection
