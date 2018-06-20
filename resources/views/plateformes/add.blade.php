@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <center><h1>Ajouter une plateforme</h1>></center>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(array('route' => 'plateformes.store','method'=>'POST')) !!}
        @include('plateformes.form')
        {!! Form::close() !!}
    </div>

@endsection