@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <center><h1>Dons</h1>></center>
            <p>Un compte stripe à été crée, le fichier .env :</p>
            <p>Grâce à API fournis par mon compte stripe</p>

            <p>STRIPE_PUB_KEY=pk_test_N9vqkCdjTpic4mJummmUB7Vf</p>
            <p>STRIPE_SECRET_KEY=sk_test_Kdd4KuNNO3xuKH6gx7YDdRfO</p>
        </div>
    </div>
@endsection

@section('script')

<script src="https://checkout.stripe.com/checkout.js" class="stripe-button tt"
        data-key="{{ env('STRIPE_PUB_KEY') }}"
        data-amount="1000"
        data-description="Vos dons nous permettrez d'améliorer le site"
        data-name="Donation">

</script>
@endsection