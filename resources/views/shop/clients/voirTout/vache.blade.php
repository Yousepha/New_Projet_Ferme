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


@if(isset($vaches))
@if(count($vaches) > 0)
<h2 class="alert alert-primary text-center" style="color:red; text:bold">Les Vaches</h2>
<div class="row">
    @foreach($vaches as $prod)
    <div class="col-md-4 card-deck container">
        <div class="card mb-4 shadow box-shadow">
            <div class="inner">
                <img src="{{ asset('images/'.$prod->photo)}}" class="card-img-top img-fluid" alt="Responsive image">
            </div>
            <div class="card-body">
                <p class="card-text">Vaches <br>{{$prod->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <strike class="barre"> {{$prod->prix + 10000}}  Fcfa</strike>
                    <h4> {{$prod->prix}} Fcfa</h4>
                    <a href="{{route('voir_produit_vache_client', ['idVache'=>$prod->idBovin])}}" class="btn btn-md btn-outline-secondary"><i class="fa fa-eye"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endif

@endsection