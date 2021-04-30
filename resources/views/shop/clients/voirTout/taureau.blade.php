@extends('layouts.client_master')
@section('content')
<style>
    .inner{
	    overflow: hidden;
    }

    .inner img{
        transition: all 1.5s ease;
    }

    .inner:hover img{
	    transform: scale(1.5);
    }
    .barre{
        color:red;
        text-decoration:line-through;
    }
</style>

@if(count($taureaux) > 0)
@if(isset($taureaux))
<h2 class="alert alert-primary text-center" style="color:red; text:bold">Les Taureaux</h2>
<div class="row">
    @foreach($taureaux as $prod)
    <div class="col-md-4 card-deck container">
        <div class="card mb-4 shadow box-shadow">
            <div class="inner">
                <img src="{{ asset('images/'.$prod->photo)}}" class="card-img-top img-fluid" alt="Responsive image">
            </div>
            <div class="card-body">
                <p class="card-text">Taureau <br>{{$prod->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <del class="barre"> {{$prod->prix + 10000}}  Fcfa</del>
                    <h4> {{$prod->prix}} Fcfa</h4>
                    <a href="{{route('voir_produit_taureau_client', ['idTaureau'=>$prod->idBovin])}}" class="btn btn-md btn-outline-secondary"><i class="fa fa-eye"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endif

@endsection