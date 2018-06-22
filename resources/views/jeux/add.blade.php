@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="jumbotron">
            <center><h1>Ajouter un jeux</h1></center>
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

        <form action="{{url('/storeJeux')}}">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>Nom</strong>
                        <input type="text" class="form-control" name="nom">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description</strong>
                        <input type="text" class="form-control" name="description">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group ">
                        <strong>Categorie:</strong>
                        <select  class="form-control" name="idCategorie" >
                            @foreach(\App\Models\Category::all() as $j)
                                <option  value="{{$j->id}}">{{$j->titre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group ">
                        <strong>Plateforme:</strong>
                        <select  class="form-control" name="idPlateforme" >
                            @foreach(\App\Models\Plateforme::all() as $j)
                                <option  value="{{$j->id}}">{{$j->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group ">
                        <strong>Status </strong>
                        <select  class="form-control" name="state" >
                            <option  value="vendre">vendre</option>
                            <option  value="neutre">neutre</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>Prix</strong>
                        <input type="text" class="form-control" name="prix">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">valider</button>
                </div>
            </div>

        </form>


    </div>

@endsection