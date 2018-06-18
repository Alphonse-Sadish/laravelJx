@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <center><h1>Ajouter un Avis</h1>></center>
        </div>

        @if (count($errors) > 0)
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    {!! Form::open(array('route' => 'avis.store','method'=>'POST')) !!}
    @include('avis.form')
    {!! Form::close() !!}
    </div>

@endsection