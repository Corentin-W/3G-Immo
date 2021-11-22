@extends('base')
@section('content')
<div class="container mt-4">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agents as $agent)
                <tr>
                    <td>{{$agent->prenom_agent}}</td>
                    <td>{{$agent->nom_agent}}</td>
                    <td><a href="{{route('agent-detail', $agent->id)}}" class="btn btn-primary">Voir les annonces</a></td>
                    <td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
