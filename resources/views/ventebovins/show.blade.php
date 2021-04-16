@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2 class="alert alert-dark text-center" style="color:red; text:bold"> Infos sur la vente du bovin {{ $data->nom }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('ventebovins.index') }}"> Retour</a>
            </div>
        </div>
    </div>
<div class="jumbotron text-center" style="margin-bottom:0">
<img src="{{ URL::to('/') }}/images/{{ $data->photo }}" class="rounded-circle" width='120' height="100" />
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom Bovin:</strong>
                {{ $data->nom }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $data->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix Bovin:</strong>
                {{ $data->prix }} Fcfa
            </div>
        </div>
        
    </div>

</div>
@endsection