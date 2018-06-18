@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="jumbotron">
            <center><h1>Modifier Avis</h1>></center>
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

    {!! Form::model($avis, ['method' => 'PATCH','route' => ['avis.update', $avis->id]]) !!}
    @include('avis.form')
    {!! Form::close() !!}
    </div>

@endsection