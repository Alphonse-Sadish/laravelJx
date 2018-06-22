@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <center><h1>Liste des jeux</h1></center>

        </div>
        <h3> Categorie des jeux</h3>
        @foreach($categorie as $c)
            <a href="{{url('/categJeux',$c->id)}}"><button type="button"  class="btn btn-secondary">{{$c->titre}}</button></a>
        @endforeach
            <a href="{{url('/jeux')}}"><button type="button"  class="btn btn-secondary">Tous</button></a>
        @foreach($jeux as $j)

            <div style="    border-style: solid; border-color:{{$j->category->couleur}}" >
                <center><p> <span style="font-weight: bolder;font-size: 18px ">{{$j->nom}}</span></p></center>
                <p> <span style="font-weight: bolder ">Categorie : </span>{{$j->category->titre}}</p>
                <p> <span style="font-weight: bolder ">Description : </span>{{$j->description}}</p>
                @foreach(\App\Models\Commentaire::all() as $c)
                    @if($c->idJeux == $j->id)
                        <p><span style="font-weight: bolder ">Commentaire :</span>{{$j->commentaires->last()->contenu}} </p>
                        @break
                    @endif
                @endforeach
                <p><span style="font-weight: bolder ">Plateforme :</span>{{$j->plateforme->nom}}</p>
            </div><br>
        @endforeach

    </div>

@endsection