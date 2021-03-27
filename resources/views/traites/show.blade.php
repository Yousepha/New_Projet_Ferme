@extends('layouts.layout_fermier')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2 class="alert alert-dark text-center" style="color:red; text:bold"> info sur la traite de {{ $vaches[0]->nom }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('traites.index') }}"> Retour</a>
            </div>
        </div>
    </div>
<div class="jumbotron text-center" style="margin-bottom:0">
<img src="{{ URL::to('/') }}/images/{{ $vaches[0]->photo }}" class="rounded-circle" width='120' height="100" />
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom Vache:</strong>
                {{ $vaches[0]->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Traite Matin:</strong>
                {{ $data->traiteMatin }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Traite Soir:</strong>
                {{ $data->traiteSoir}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Traite:</strong>
                {{ $data->dateTraite}}
            </div>
        </div>
        
    </div>

</div>
@endsection