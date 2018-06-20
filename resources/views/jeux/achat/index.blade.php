@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <center><h1>Vente des jeux</h1></center>
            <p>Les couleurs des categories :</p>
            <p>Action      : orange</p>
            <p>Fantastique : bleu</p>
            <p>MMO         : vert</p>




        </div>


    @foreach($jeux as $j)
            <div style="    border-style: solid; border-color:{{$j->category->couleur}}" >
                <h3><center>{{$j->nom}}</center></h3>
                <img src="{{$j->image}}">

                <p> <span style="font-weight: bolder ">Description : </span>{{$j->description}}</p>
                <p><span style="font-weight: bolder ">Plateforme :</span>{{$j->plateforme->nom}}</p>
                <p><span style="font-weight: bolder " id="price">Prix de vente en dollar :</span>{{$j->prix}}</p>
                <center><a href="{{url('/achatJeux',$j->id)}}"><button type="button" class="btn btn-success">Acheter</button></a></center><br>
            </div><br>


    @endforeach

    </div>

@endsection