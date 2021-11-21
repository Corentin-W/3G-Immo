@extends('base')
@section('content')

<div class="form__add">
    <div class=" my-3 p-3 bg-body rounded shadow-sm">
        <h1 class="border-bottom pb-2 mb-4">Edition d'une annonce</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <form method="post" action="{{route('update', $annonce->id)}}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
            <label for="ref_annonce">Référence de l'annonce</label>
            <input type="text" class="form-control"  value="{{$annonce->ref_annonce}}" name="ref_annonce">
            </div>
            <div class="form-group">
                <label for="prix_annonce">Prix en Euros</label>
                <input type="number" class="form-control"  value="{{$annonce->prix_annonce}}" name="prix_annonce">
            </div>
            <div class="form-group">
            <label for="surface_habitable">Surface habitable en m2</label>
            <input type="number" class="form-control"  value="{{$annonce->surface_habitable}}" name="surface_habitable">
            </div>
            <div class="form-group">
                <label for="nombre_de_piece">Nombre de pièces</label>
                <input type="number" class="form-control"  value="{{$annonce->nombre_de_piece}}" name="nombre_de_piece">
            </div>
            <div class="form-group">
                <label for="agent">Agent</label>
                <select name="agent" id="" class="form-control">
                    <option value="{{$agentOwner->id}}">{{$agentOwner->prenom_agent}} {{$agentOwner->nom_agent}}</option>
                    @foreach ($agents as $agent)
                        <option name="agent" value="{{$agent->id}}">{{$agent->prenom_agent}} {{$agent->nom_agent}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
            <a href="{{route('browse')}}" class="btn btn-danger">Annuler</a>
        </form>
    </div>
</div>
@endsection
