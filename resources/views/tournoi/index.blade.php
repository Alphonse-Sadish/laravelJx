@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <center><h1>Liste des tournois</h1></center>

        </div>

        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('tournoi.create') }}">
            <button type="submit" class="btn btn-default">Créer un tournoi</button>
        </a>

        <table>
            <thead>
                <th>Nom</th>
                <th>Nombre de participants</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            @foreach($tournois as $tournoi)
                <tr>
                    <td>{{$tournoi->name}}</td>
                    <td>{{$tournoi->nb_participants}}</td>
                    <td> <a href="{{ route('tournoi.participe', $tournoi->id) }}">
                            <button type="submit" class="btn btn-default">Participez au tournoi</button>
                        </a> </td>
                    <td><a href="{{ route('tournoi.show', $tournoi->id) }}">
                            <button type="submit" class="btn btn-default">Voir les participants</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection