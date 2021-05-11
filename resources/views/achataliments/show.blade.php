@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2 class="alert alert-dark text-center" style="color:red; text:bold"> Info sur l'achat de l'aliment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('achataliments.index') }}"> Retour</a>
            </div>
        </div>
    </div>
<div class="jumbotron text-center" style="margin-bottom:0">
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Achat Aliment:</strong>
                {{ $data->dateAchatAliment }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom Aliment:</strong>
                {{ $data->nomAliment }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantité:</strong>
                {{ $data->quantite }}(kg)
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Montant:</strong>
                {{ $data->montant }} Fcfa
            </div>
        </div>
    </div>

</div>
@endsection