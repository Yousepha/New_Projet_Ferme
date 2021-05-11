@extends('layouts.layout_fermier')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2 class="alert alert-dark text-center" style="color:red; text:bold"> Info sur l'aliment : {{ $data->nomAlimentation }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('alimentationjour.index') }}"> Retour</a>
            </div>
        </div>
    </div>
<div class="jumbotron text-center" style="margin-bottom:0">
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom Aliment:</strong>
                {{ $data->nomAlimentation }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quatite Aliment:</strong>
                {{ $data->quantite}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                {{ $data->date }}
            </div>
        </div>
        
    </div>

</div>
@endsection