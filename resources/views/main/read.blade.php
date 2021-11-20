@extends('base')
@section('content')

<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="https://www.eci-immobilier.fr/sites/default/files/styles/diaporama/public/p1800153.jpg?itok=DnycDw4j" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Réf: {{$annonce->ref_annonce}}</h5>
      <p class="card-text">Pirx: {{$annonce->prix_annonce}}€</p>
      <p class="card-text">Surface habitable: {{$annonce->surface_habitable}}</p>
      <p class="card-text">Nombre de pièces: {{$annonce->nombre_de_piece}}</p>
    </div>
  </div>
  <a href="{{route('browse')}}" class="btn btn-primary">Retour au menu</a>


  
@endsection
