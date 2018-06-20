@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <center><h1>listes des Utilisateurs</h1>></center>
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
                <th scope="col">nom</th>
                <th scope="col">email</th>

                <th scope="col">deactivated</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $a)
                <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->name}}</td>
                    <td>{{$a->email}}</td>

                    <td>{{$a->delete_at}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $a->id],'style'=>'display:inline']) !!}
                        {!! Form::submit(\App\State::state($a->delete_at)) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection