<!-- Client de Paiement Stripe (pour effectuer les paiements, env.)-->
@extends('design')

<base href="/public">
@section('payment')

    @if(session('payment_confirm_message'))
        <div class="mb-4 border px-4 py-3 rounded relative" style="padding: 10px; background-color: green; color: white;">
            {{ session('payment_confirm_message') }}
        </div>
    @endif
    <html>
        <head>
            <title>Paiement</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        </head>
        <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table" >
                                <h3 class="panel-title" >Détails de Paiement</h3>
                        </div>
                        <div class="panel-body">
                            @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif
                            <form action="{{route('payment.post')}}" role="form" 
                                    method="post" 
                                    class="require-validation"
                                    data-cc-on-file="false"
                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                    id="payment-form">

                                @csrf
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Adresse Client</label> <input
                                            class='form-control' size='4' type='text'>
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Téléphone Client</label> <input
                                            class='form-control' size='4' type='text'>
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Nom sur la carte</label> <input
                                            class='form-control' size='4' type='text'>
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>№ de carte</label> <input autocomplete='off' class='form-control card-number' size='20' type='text' required>
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>Numéro de sécurité</label> <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' required>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Date Expiration (Mois)</label> <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' required>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Date Expiration (Année)</label> <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' required>
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Confirmer le paiement | {{$pay_price}}€</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
        </body>
    </html>

@endsection