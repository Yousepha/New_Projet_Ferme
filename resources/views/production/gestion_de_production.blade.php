@extends('layouts.master')
@section('content')
<div class="jumbotron ">
<h1 class="alert alert-dark text-center" style="color:red; text:bold">Consulter la production de lait et la consommation d'aliment par jour</h1>
  
<section class="pt-1 linear-g-w m-5">
    <!-- <h1 class="h1-section mr-auto text-center text-primary" id="bovin">Nos Produits</h1> -->
    <div class="card-deck container">
        <div class="card shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="images/productions/alimentation.jpg">
            </div>
            <div class="card-body">
                <h4 class="card-title"><a style="text-decoration:none" href="{{ route('product_aliment.index') }}"><button class="btn btn-block btn-primary">Consulter la Consommation d'aliment par jour</button></a></h4>
            </div>
        </div>
        <div class="card shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="images/productions/lait-vache.jpg">
            </div>
            <div class="card-body">
                <h4 class="card-title"><a style="text-decoration:none" href="{{ route('product_lait.index') }}"><button class="btn btn-block btn-primary">Consulter la production de Laits journalière</button></a></h4>
            </div>
        </div>
    </div>
</section>
</div>
@endsection