@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <center><h1>Création d'un tournoi</h1></center>

        </div>
        {!! Form::open(['url' => 'tournoi/add']) !!}
        {!! Form::label('nom', 'Entrez le nom du tournoi : ') !!}
        {!! Form::text('name') !!}
        {!! Form::label('participant', 'Sélectionner le nombre de participants : ') !!}
        {!! Form::select('participant', ['8' => 8, '16' => 16],'8') !!}
        {!! Form::submit('Créer le tournoi') !!}

        {!! Form::close() !!}

    </div>

@endsection