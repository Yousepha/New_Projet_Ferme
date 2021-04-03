@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2 class="alert alert-dark text-center" style="color:red; text:bold"> Infos sur la vente de lait de {{ $bouteilles[0]->capacite }} Litre(s)</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('ventelaits.index') }}"> Retour</a>
            </div>
        </div>
    </div>
<div class="jumbotron text-center" style="margin-bottom:0">
<img src="{{ URL::to('/') }}/images/{{ $bouteilles[0]->photo }}" class="rounded-circle" width='120' height="100" />
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Capacite:</strong>
                {{ $bouteilles[0]->capacite }} Litre(s)
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix unitaire Bouteille:</strong>
                {{ $bouteilles[0]->prix }} Fcfa
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix Total:</strong>
                {{ $data->prixTotale }} Fcfa
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $bouteilles[0]->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Bouteille Vendu:</strong>
                {{ $bouteilles[0]->nbrBouteilleVendu }}
            </div>
        </div>
        
    </div>

</div>
@endsection