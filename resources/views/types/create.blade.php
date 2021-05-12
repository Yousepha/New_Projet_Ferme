@extends('layouts.master')
  
@section('content')
<style>
    form {
    width: 50%;
    margin: 0 auto;
    }
</style>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="">
            <h2 class="alert alert-dark text-center" style="color:red; text:bold">Créer le Type</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary fa fa-reply-all" href="{{ route('types.index') }}"> Retour</a>
        </div>
    </div>
</div>
   
{{--@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Avertissement!</strong>Veuillez vérifier votre code d'entrée<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif--}}
   
<form action="{{ route('types.store') }}" method="POST">
    @csrf
     <div class="row card shadow">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom Race:</strong>
                <input type="text" name="nomType" class="form-control" placeholder="Nom race" value="{{ old('nomType') }}">
                <span style="color:red">@error('nomType') {{$message}} @enderror</span>
            
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-block">Valider</button>
        </div>
    </div>
   
</form>
@endsection