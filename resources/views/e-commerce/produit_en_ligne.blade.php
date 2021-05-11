@extends('layouts.master')
@section('content')

<h1 class="alert alert-dark text-center" style="color:red; text:bold">Gestion des produits en lignes</h1>
  
<section class="pt-1 linear-g-w m-5">
    <h1 class="h1-section mr-auto text-center text-primary" id="bovin">Nos Produits</h1>
    <div class="card-deck container">
        <div class="card shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="images/bovins/vache.png">
            </div>
            <div class="card-body">
                <h4 class="card-title"><a style="text-decoration:none" href="{{ route('ventebovins.index') }}"><button class="btn btn-block btn-primary">Mettre les Bovins en ligne</button></a></h4>
            </div>
        </div>
        <div class="card shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="images/laits/bouteille0.5L1.jpg">
            </div>
            <div class="card-body">
                <h4 class="card-title"><a style="text-decoration:none" href="{{ route('bouteilles.index') }}"><button class="btn btn-block btn-primary">Mettre le Lait en ligne</button></a></h4>
            </div>
        </div>
    </div>
@endsection