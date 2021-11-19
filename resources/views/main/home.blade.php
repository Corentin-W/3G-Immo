@extends('base')
@section('content')
<div class="btn btn-primary  m-2">
    <a href="{{route('create')}}">Ajout d'une nouvelle annonce</a>
</div>
<em>Date
    <a href="{{route('order-by-date', 'asc')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
          </svg>
    </a>
    <a href="{{route('order-by-date', 'desc')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
          </svg>
    </a>
</em>
<em>Prix
    <a href="{{route('order-by-price', 'asc')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
          </svg>
    </a>
    <a href="{{route('order-by-price', 'desc')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
          </svg>
    </a>
</em>
<em>Surface habitable
    <a href="{{route('order-by-surface', 'asc')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
          </svg>
    </a>
    <a href="{{route('order-by-surface', 'desc')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
          </svg>
    </a>
</em>
<em>Nombre de pièces
    <a href="{{route('order-by-rooms', 'asc')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
          </svg>
    </a>
    <a href="{{route('order-by-rooms', 'desc')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
          </svg>
    </a>
</em>
<div class="card-group">
    @foreach ($annonces as $annonce)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://www.eci-immobilier.fr/sites/default/files/styles/diaporama/public/p1800153.jpg?itok=DnycDw4j" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Ref: {{$annonce->ref_annonce}}</h5>
                <p class="card-text">Prix: {{$annonce->prix_annonce}}€</p>
                <p class="card-text">Surface: {{$annonce->surface_habitable}} m2</p>
                <p class="card-text"> {{$annonce->nombre_de_piece}} pièces</p>
                <p class="card-text">Agent: <a href="{{route('agent-detail', $annonce->agent->id)}}">{{$annonce->agent->prenom_agent}} {{$annonce->agent->nom_agent}}</a></p>
                <a href="{{route('read', $annonce->id)}}" class="btn btn-primary">Voir</a>
                <a href="{{route('edit', $annonce->id)}}" class="btn btn-success">Editer</a>
                <a href="{{route('delete', $annonce->id)}}" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">Supprimer</a>
            </div>
    </div>
    @endforeach
</div>
{{$annonces->links()}}
@endsection

