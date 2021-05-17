@extends('layouts.master')
@section('content')
<div class="jumbotron">
<h1 class="alert alert-dark text-center" style="color:red; text:bold">Gestion des commandes</h1>
  
<section class="pt-1 linear-g-w m-5">
    <div class="card-deck container">
        <div class="card shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="panier/bovins.png">
            </div>
            <div class="card-body">
                <h4 class="card-title"><a style="text-decoration:none" href="{{ route('liste_commandes') }}"><button class="btn btn-block btn-primary">Consulter les Commandes de Bovins</button></a></h4>
            </div>
        </div>
        <div class="card shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="panier/lait-de-vache.png" style="height:307px">
            </div>
            <div class="card-body">
                <h4 class="card-title"><a style="text-decoration:none" href="{{ route('liste_commandes_lait') }}"><button class="btn btn-block btn-primary">Consulter les Commandes de Laits</button></a></h4>
            </div>
        </div>
    </div>
</section>
</div>
@endsection