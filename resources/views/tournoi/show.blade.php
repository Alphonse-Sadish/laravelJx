@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <center><h1>{{$tournoi->name}}</h1></center>

        </div>
        Liste des participants :
        <ul>
            @foreach($participants as $participant)
                <li>
                    {{ $participant->name }}
                </li>
            @endforeach
        </ul>

        @if($match_participant!=null)
            Liste des matchs:
            <ul>
                @foreach($match_participant as $match)
                    <li>
                        {{ $match[0]['name'] }} VS {{ $match[1]['name'] }}
                    </li>
                @endforeach
            </ul>
        @endif
        <a href="{{ route('tournoi.index') }}">
            <button type="submit" class="btn btn-default">Retour sur le tableau des tournois</button>
        </a>
    </div>

@endsection