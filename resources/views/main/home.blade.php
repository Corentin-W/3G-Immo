@extends('base')
@section('content')
<div class="btn btn-primary  m-2">
    <a href="{{route('create')}}">Ajout d'une nouvelle annonce</a>
</div>
<div class="card-group">
    @foreach ($annonces as $annonce)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://www.eci-immobilier.fr/sites/default/files/styles/diaporama/public/p1800153.jpg?itok=DnycDw4j" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Ref: {{$annonce->ref_annonce}}</h5>
                <p class="card-text">Prix: {{$annonce->prix_annonce}}€</p>
                <p class="card-text">Surface: {{$annonce->surface_habitable}} m2</p>
                <p class="card-text"> {{$annonce->nombre_de_piece}} pièces</p>
                <p class="card-text">Agent: </p>
                <a href="{{route('read', $annonce->id)}}" class="btn btn-primary">Voir</a>
                <a href="{{route('edit', $annonce->id)}}" class="btn btn-success">Editer</a>
                <a href="{{route('delete', $annonce->id)}}" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">Supprimer</a>
            </div>
    </div>
    @endforeach
</div>
{{$annonces->links()}}
@endsection

