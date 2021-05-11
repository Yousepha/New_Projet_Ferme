@extends('layouts.master')
@section('content')

<h1 class="alert alert-dark text-center" style="color:red; text:bold">Gestion des produits en lignes</h1>
  
<section class="pt-1 linear-g-w m-5">

    <h1 class="h1-section mr-auto text-center text-primary" id="bovin">Nos animaux</h1>
    <div class="card-deck container">
        <div class="card shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="images/bovins/vache.png">
            </div>
            <div class="card-body">
                <h4 class="card-title"><button class="btn btn-block btn-primary">Mettre les Bovins en ligne</button></h4>
                <!-- <p class="card-text">Nos vaches</p> -->
            </div>
        </div>
        {{--<div class="card shadow">
            <div class="inner">
                <img class="card-img-top  img-fluid" src="images/bovins/taureau.png">
            </div>
            <div class="card-body">
                <h4 class="card-title"> <button class="btn btn-primary">Mettre le Lait en ligne</button></h4>
                <p class="card-text">taureau</p>
            </div>
        </div>--}}
        <div class="card shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="images/laits/bouteille0.5L1.jpg">
            </div>
            <div class="card-body">
                <h4 class="card-title"><button class="btn btn-block btn-primary">Mettre le Lait en ligne</button></h4>
                <!-- <p class="card-text">Nos Genisses</p> -->
            </div>
        </div>
        {{--<div class="card shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="images/bovins/veaux.png">
            </div>
            <div class="card-body">
                <h4 class="card-title"><button class="btn btn-primary">Editer</button></h4>
                <p class="card-text">Nos veaux</p>
            </div>
        </div>--}}
    </div>

    <h1 class="h1-section mr-auto text-primary my-5" id="lait">Nos produits Laitèrs</h1>
    <div class="card-deck container ">
        {{--<div class="card mb-3 shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="images/laits/bouteille0.5L1.jpg">
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary">Editer</a>
                <p class="card-text">Bouteille de 0.5L</p>
                <p class="card-text text-info"> Prix: 500fr</p>
            </div>
        </div>--}}
        <div class="card mb-3 shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="images/laits/bouteille1L.jpg">
            </div>
            <div class="card-body ">
                <a href="#" class="btn btn-primary">Editer</a>
                <p class="card-text">Bouteille de 1L</p>
                <p class="card-text text-info"> Prix: 1000fr</p>
            </div>
        </div>
        <div class="card mb-3 shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="images/laits/bidon5L.jpg">
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary">Editer</a>
                <p class="card-text">Bouteille de 5L</p>
                <p class="card-text text-info"> Prix: 5000fr</p>
            </div>
        </div>
        {{--<div class="card mb-3 shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="images/laits/bidon20L.jpg">
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary">Editer</a>
                <p class="card-text">Bouteille de 20L</p>
                <p class="card-text text-info" > Prix: 20000fr</p>
            </div>
        </div>--}}
    </div>

</section>
@endsection