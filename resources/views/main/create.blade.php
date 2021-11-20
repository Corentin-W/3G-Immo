@extends('base')
@section('content')

<div class=" my-3 p-3 bg-body rounded shadow-sm">
    <h1 class="border-bottom pb-2 mb-4">Ajout d'une annonce</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <form method="post" action="{{route('add')}}">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
        <label for="ref_annonce">Référence de l'annonce</label>
        <input type="text" class="form-control"  placeholder="123654FG" name="ref_annonce">
        </div>
        <div class="form-group">
            <label for="prix_annonce">Prix en Euros</label>
            <input type="number" step="0.01" class="form-control"  placeholder="400000" name="prix_annonce">
        </div>
        <div class="form-group">
        <label for="surface_habitable">Surface habitable en m2</label>
        <input type="number" class="form-control"  placeholder="127" name="surface_habitable">
        </div>
        <div class="form-group">
            <label for="nombre_de_piece">Nombre de pièces</label>
            <input type="number" class="form-control"  placeholder="5" name="nombre_de_piece">
        </div>
        <div class="form-group">
            <label for="agent">Agent</label>
            <select name="agent" id="" class="form-control">
                <option value=""></option>
                @foreach ($agents as $agent)
                    <option name="agent" value="{{$agent->id}}">{{$agent->prenom_agent}} {{$agent->nom_agent}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
        <a href="{{route('browse')}}" class="btn btn-danger">Annuler</a>
    </form>
</div>
@endsection
