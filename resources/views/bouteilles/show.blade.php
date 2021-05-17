@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2 class="alert alert-dark text-center" style="color:red; text:bold"> Infos sur la vente de la bouteille de lait de {{ $bouteilles->capacite }} Litre(s)</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('bouteilles.index') }}"> Retour</a>
            </div>
        </div>
    </div>
<div class="jumbotron text-center" style="margin-bottom:0">
<img src="{{ URL::to('/') }}/images/{{ $bouteilles->photo }}" class="rounded-circle" width='120' height="100" />
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Capacite:</strong>
                {{ $bouteilles->capacite }} Litre(s)
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Bouteille:</strong>
                {{ $bouteilles->nombreDispo }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix unitaire Bouteille:</strong>
                {{ $bouteilles->prix }} Fcfa
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix Total:</strong>
                {{ $bouteilles->prix * $bouteilles->nombreDispo}} Fcfa
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $bouteilles->description }}
            </div>
        </div>
        
    </div>

</div>
@endsection