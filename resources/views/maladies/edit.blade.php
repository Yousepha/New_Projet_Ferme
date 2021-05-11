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
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Editer la Maladie</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('maladies.index') }}"> Retour</a>
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
  
    <form action="{{ route('maladies.update',$data->idMaladie) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row card shadow">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom Maladie:</strong>
                    <input type="text" name="nomMaladie" value="{{ $data->nomMaladie }}" class="form-control" placeholder="nom maladie">
                    <span style="color:red">@error('nomMaladie') {{$message}} @enderror</span>
                
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-block btn-primary">Valider</button>
            </div>
        </div>
   
    </form>
@endsection