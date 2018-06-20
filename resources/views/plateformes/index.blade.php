@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <center><h1>listes des Plateformes</h1>></center>
            <a type="button" href="{{route('plateformes.create')}}" class="btn btn-primary">Ajouter une plateforme</a>
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
                <th scope="col">Nom</th>
                <th scope="col">Couleur</th>

                <th scope="col">deactivated</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($plateformes as $a)
                <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->nom}}</td>
                    <td>{{$a->couleur}}</td>

                    <td>{{$a->delete_at}}</td>
                    <td>
                        <a href="{{route('plateformes.edit',$a->id)}}">&#x2710;</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['plateformes.destroy', $a->id],'style'=>'display:inline']) !!}
                        {!! Form::submit(\App\State::state($a->delete_at)) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection