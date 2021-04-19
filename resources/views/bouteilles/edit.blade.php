@extends('layouts.layout_fermier')
   
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
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Modifier la capacite de la bouteille</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('bouteilles.index') }}"> Retour</a>
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
    
    @if($message = Session::get('error'))
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert" type="button">x</button>
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif

  
    <form action="{{ route('bouteilles.update',$data->idBouteille) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row jumbotron text-white bg-dark">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Capacite:</strong>
                    <input type="number" oninput="this.value = Math.abs(this.value)" name="capacite" value="{{ $data->capacite }}" class="form-control">
                    <span style="color:red">@error('capacite') {{$message}} @enderror</span>
                
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre Bouteille Dispo:</strong>
                    <input type="number" min="1" name="nombreDispo" value="{{ $data->nombreDispo }}" oninput="this.value = Math.abs(this.value)" class="form-control">
                    <span style="color:red">@error('nombreDispo') {{$message}} @enderror</span>
               
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-block btn-primary">Valider</button>
            </div>
        </div>
   
    </form>
@endsection