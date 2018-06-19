@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <center><h1>liste des Categories</h1>></center>
            <a type="button" href="{{route('categories.create')}}" class="btn btn-primary">Ajouter une categorie</a>
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
                <th scope="col">couleur</th>

                <th scope="col">deactivated</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $categ)
                <tr>
                    <td>{{$categ->id}}</td>
                    <td>{{$categ->titre}}</td>
                    <td>{{$categ->couleur}}</td>
                    <td>{{$categ->delete_at}}</td>
                    <td>
                        <a href="{{route('categories.edit',$categ->id)}}">&#x2710;</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $categ->id],'style'=>'display:inline']) !!}
                        {!! Form::submit(\App\State::state($categ->delete_at)) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection