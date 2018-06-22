@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <center><h1>liste des Commentaires</h1></center>
            <a type="button" href="{{route('commentaires.create')}}" class="btn btn-primary">Ajouter un commentaire</a>
        </div>

        @if (session('response'))
            <div class="alert alert-success">
                {{ session('response') }}
            </div>
        @endif

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Contenu</th>
                <th scope="col">Jeux</th>
                <th scope="col">Utilisateur</th>
                <th scope="col">deactivated</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($commentaire as $a)
                <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->contenu}}</td>
                    <td>{{$a->jeux->nom}}</td>
                    <td>{{$a->user->name}}</td>
                    <td>{{$a->delete_at}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['commentaires.destroy', $a->id],'style'=>'display:inline']) !!}
                        {!! Form::submit(\App\State::state($a->delete_at)) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection