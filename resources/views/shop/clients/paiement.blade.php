@extends('layouts.client_master')
@section('content')

<style>
    form {
    width: 50%;
    margin: 0 auto;
    }
</style>

<main role="main">

    <div class="container">
        <div class="py-5 jumbotron bg-dark text-white text-center">
            <i class="fa fa-5x fa-cc-visa"></i>
            <i class="fa fa-5x fa-money"></i>
            <i class="fa fa-5x fa-cc-mastercard"></i>


            <h2>Paiement</h2>
            <h4 class="mt-3">Total à régler: {{ $total_prix_panier }} Fcfa</h4>

        </div>
        <form action="{{ route('ma_commande') }}" method="post" id="paiement">
        @csrf
            <div class="mb-4 text-center">
                <label class="col-md-12" for="ville">Choisir le moyen de paiement <span class="text-danger">*</span></label>
                <select name="moyenDePaiement" class="custom-select d-block w-100" id="country" required>
                    <option value="Orange money">Orange money</option>
                    <option value="Wari">Wari</option>
                    <option value="Wave">Wave</option>
                    <option value="Free money">Free money</option>
                
                </select>
                <input type="hidden" name="montant" value="{{ $total_prix_panier }}">
            </div>
        </form>

        <div class="row">

            <div class="col-md-12 order-md-1">

                    <button form="paiement" class="btn btn-warning btn-lg btn-block" type="submit">Payer</button>
            </div>
        </div>
    </div>

</main>

@endsection