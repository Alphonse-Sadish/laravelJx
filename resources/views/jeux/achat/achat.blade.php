@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="jumbotron">
            <center><h1>Renseignement</h1></center>
            <p>Saisir les informations pour pouvoir livrer le jeux</p>
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

        <form action="{{url('/renseignement',$idj)}}">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>age</strong>
                        <input type="text" class="form-control" name="age">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>adresse:</strong>
                        <input type="text" class="form-control" name="adresse">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>rue</strong>
                        <input class="form-control" type="text" name="rue">
                    </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group ">
                        <strong>bat,appart:</strong>
                        <input class="form-control" type="text" name="rue">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">valider</button>
                </div>
            </div>

        </form>


    </div>

@endsection