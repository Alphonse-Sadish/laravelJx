@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <center><h1>Mes Avis</h1>></center>
            <a type="button" href="{{route('monavis.create')}}" class="btn btn-primary">Ajouter un avis</a>
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
                <th scope="col">titre</th>
                <th scope="col">contenu</th>
                <th scope="col">note</th>
                <th scope="col">utilisateur</th>
                <th scope="col">deactivated</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($avis as $a)
                <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->titre}}</td>
                    <td>{{$a->contenu}}</td>
                    <td>{{$a->note}}</td>
                    <td>{{$a->user->name}}</td>
                    <td>{{$a->delete_at}}</td>
                    <td>
                        <a href="{{route('monavis.edit',$a->id)}}">&#x2710;</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['monavis.destroy', $a->id],'style'=>'display:inline']) !!}
                        {!! Form::submit(\App\State::state($a->delete_at)) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection