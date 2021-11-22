@extends('base')
@section('content')
<div class="text-center mt-4 mb-4">
    <span class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Date de publication
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{route('order-by-date', 'asc')}}">Plus ancienne</a>
        <a class="dropdown-item" href="{{route('order-by-date', 'desc')}}">Plus récente</a>
        </div>
    </span>
    <span class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Prix
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{route('order-by-price', 'asc')}}">Croissant</a>
        <a class="dropdown-item" href="{{route('order-by-price', 'desc')}}">Décroissant</a>
        </div>
    </span>
    <span class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Surface habitable
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{route('order-by-surface', 'asc')}}">Croissant</a>
        <a class="dropdown-item" href="{{route('order-by-surface', 'desc')}}">Décroissant</a>
        </div>
    </span>
        <span class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Nombre de pièces
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('order-by-rooms', 'asc')}}">Croissant</a>
            <a class="dropdown-item" href="{{route('order-by-rooms', 'desc')}}">Décroissant</a>
            </div>
        </span>
</div>


<div class="section">
    <div class="card-grid">
        <div class="row flex-row-stretch">
            @foreach ($annonces as $annonce)
            <div class="col-sm-6 col-md-4 col-lg-3 flex-col">
                <div class="card">
                    <img class="card-img-top" src="https://www.eci-immobilier.fr/sites/default/files/styles/diaporama/public/p1800153.jpg?itok=DnycDw4j" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Référence: {{$annonce->ref_annonce}}</h5>
                        <p class="card-text">Prix: {{$annonce->prix_annonce}}€</p>
                        <p class="card-text">Surface: {{$annonce->surface_habitable}} m2</p>
                        <p class="card-text"> {{$annonce->nombre_de_piece}} pièces</p>
                        <p class="card-text">Agent: <a href="{{route('agent-detail', $annonce->agent->id)}}">{{$annonce->agent->prenom_agent}} {{$annonce->agent->nom_agent}}</a></p>
                        <a href="{{route('read', $annonce->id)}}" class="btn btn-primary">Voir</a>
                        @auth
                        <a href="{{route('edit', $annonce->id)}}" class="btn btn-success">Editer</a>
                        <a href="{{route('delete', $annonce->id)}}" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">Supprimer</a>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class=" d-flex justify-content-center mt-3">
        {{$annonces->links()}}
        </div>
    </div>
</div>

@endsection



