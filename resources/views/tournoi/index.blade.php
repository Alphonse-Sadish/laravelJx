@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <center><h1>Liste des tournois</h1></center>

        </div>
        <table>
            <thead>
                <th>Nom</th>
                <th>Nombre de participants</th>
                <th>Action</th>
            </thead>
            <tbody>
            @foreach($tournois as $tournoi)
                <tr>
                    <td>{{$tournoi->name}}</td>
                    <td>{{$tournoi->nb_participants}}</td>
                    <td> <a href="{{ route('tournoi/participe', $tournoi->id) }}">
                            <button type="submit" class="btn btn-default">Participez au tournoi</button>
                        </a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection