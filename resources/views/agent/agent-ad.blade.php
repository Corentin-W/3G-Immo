@extends('base')
@section('content')

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Référence</th>
                <th scope="col">Prix</th>
                <th scope="col">Surface</th>
                <th scope="col">Pièces</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($annonces as $annonce)
                <tr>
                    <td>{{$annonce->ref_annonce}}</td>
                    <td>{{$annonce->prix_annonce}}</td>
                    <td>{{$annonce->surface_habitable}}</td>
                    <td>{{$annonce->nombre_de_piece}}</td>
                    <td>
                        <a href="{{route('edit', $annonce->id)}}" class="btn btn-info">Editer</a>
                        <a href="{{route('delete', $annonce->id)}}" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



@endsection
