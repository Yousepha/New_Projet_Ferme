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

    <div class="jumbotron bg-dark text-white text-center">
        <h2 class="alert alert-dark text-center" style="color:red; text:bold">Les derniers produits ajoutés !</h2>
    </div>
        
        @if(count($taureaux) > 0)
        @if(isset($taureaux))
        <h2 class="alert alert-primary text-center" style="color:red; text:bold">Les Taureaux<button class="pull-right text-white btn-dark">Voir tout</button></h2>
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
                                <a href="{{route('voir_produit_taureau_client', ['idTaureau'=>$prod->idBovin])}}" class="btn btn-md btn-outline-secondary"><i class="fa fa-lg fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @endif
            <!--  -->
            
            @if(isset($velles))
            @if(count($velles) > 0)
            <h2 class="alert alert-primary text-center" style="color:red; text:bold">Les Velles<button class="pull-right text-white btn-dark">Voir tout</button></h2>
            <div class="row">
                @foreach($velles as $prod)
                <div class="col-md-4 card-deck container">
                    <div class="card mb-4 shadow box-shadow">
                        <div class="inner">
                            <img src="{{ asset('images/'.$prod->photo)}}" class="card-img-top img-fluid" alt="Responsive image">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Velle <br>{{$prod->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <strike class="barre"> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <a href="{{route('voir_produit_velle_client', ['idVelle'=>$prod->idBovin])}}" class="btn btn-md btn-outline-secondary"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @endif

            @if(isset($bouteilles))
            @if(count($bouteilles) > 0)
            <h2 class="alert alert-dark text-center" style="color:blue; text:bold">Les produits laitiers !<button class="pull-right text-white btn-dark">Voir tout</button></h2>
            <div class="row">
                @foreach($bouteilles as $prod)
                <div class="col-md-4 card-deck container">
                    <div class="card mb-4 shadow box-shadow">
                        <div class="inner">
                            <img src="{{ asset('images/'.$prod->photo)}}" class="card-img-top img-fluid" alt="Responsive image">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Bouteille <br>{{$prod->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <strike class="barre"> {{$prod->prix + 1000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <!-- <h4> {{$prod->nombreDispo}} en stock</h4> -->
                                <a href="{{route('voir_produit_lait_client', ['idLait'=>$prod->idBouteille])}}" class="btn btn-md btn-outline-secondary"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @endif

            
            @if(isset($vaches))
            @if(count($vaches) > 0)
            <h2 class="alert alert-primary text-center" style="color:red; text:bold">Les Vaches<button class="pull-right text-white btn-dark">Voir tout</button></h2>
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
            
            @if(isset($genisses))
            @if(count($genisses) > 0)
            <h2 class="alert alert-primary text-center" style="color:red; text:bold">Les Genisses<button class="pull-right text-white btn-dark">Voir tout</button></h2>
            <div class="row">
                @foreach($genisses as $prod)
                <div class="col-md-4 card-deck container">
                    <div class="card mb-4 shadow box-shadow">
                        <div class="inner">
                            <img src="{{ asset('images/'.$prod->photo)}}" class="card-img-top img-fluid" alt="Responsive image">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Genisse <br>{{$prod->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <strike class="barre"> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <a href="{{route('voir_produit_genisse_client', ['idGenisse'=>$prod->idBovin])}}" class="btn btn-md btn-outline-secondary"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @endif

            @if(isset($veaux))
            @if(count($veaux) > 0)
            <h2 class="alert alert-primary text-center" style="color:red; text:bold">Les Veaux<button class="pull-right text-white btn-dark">Voir tout</button></h2>
            <div class="row">
                @foreach($veaux as $prod)
                <div class="col-md-4 card-deck container">
                    <div class="card mb-4 shadow box-shadow">
                        <div class="inner">
                            <img src="{{ asset('images/'.$prod->photo)}}" class="card-img-top img-fluid" alt="Responsive image">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Veau <br>{{$prod->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <strike class="barre"> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <a href="{{route('voir_produit_veau_client', ['idVeau'=>$prod->idBovin])}}" class="btn btn-md btn-outline-secondary"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @endif
            
        </div>
    </div>
</div>


@endsection