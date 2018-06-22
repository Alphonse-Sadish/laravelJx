@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <center><h1>Achat du jeux</h1></center>
        </div>
    </div>
@endsection

@section('script')

    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button tt"
            data-key="{{ env('STRIPE_PUB_KEY') }}"
            data-amount="{{$idJeuxprice}}00"
            data-description=""
            data-name="Achat du jeux {{$idJeuxNom}} ">
    </script>
@endsection