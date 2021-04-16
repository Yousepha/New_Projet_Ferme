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
            <h2 class="alert alert-dark text-center" style="color:red; text:bold">Ajouter l'Aliment</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary fa fa-reply-all" href="{{ route('alimentationjour.index') }}"> Retour</a>
        </div>
    </div>
</div>
   
    @if($message = Session::get('error'))
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert" type="button">x</button>
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif
    @if($message = Session::get('selected'))
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert" type="button">x</button>
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif
   
<form action="{{ route('alimentationjour.store') }}" method="POST">
    @csrf
     <div class="row jumbotron text-white bg-dark">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom Aliment:</strong>
                <div class="">
                    <select name="nomAlimentation" class="form-control" required>
                        @foreach($achat_aliment as $aliment)
                        <option value="{{ $aliment->nomAliment }}">
                            {{ $aliment->nomAliment }}
                        </option>
                        @endforeach
                    </select>
                    <span style="color:red">@error('nomAlimentation') {{$message}} @enderror</span>
                </div>
                <!-- {{--<input type="text" name="nomAlimentation" class="form-control" placeholder="nom aliment" value="{{ old('nomAlimentation') }}">
                <span style="color:red">@error('nomAlimentation') {{$message}} @enderror</span>--}}-->
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quatite Aliment:</strong>
                <input type="number" name="quantite" oninput="this.value = Math.abs(this.value)" class="form-control" placeholder="quantite" value="{{ old('quantite') }}">
                <span style="color:red">@error('quantite') {{$message}} @enderror</span>
            
            </div>
        </div>
        {{--<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                <input type="date" name="date" class="form-control" placeholder="Date" value="{{ old('date') }}">
                <span style="color:red">@error('date') {{$message}} @enderror</span>
            
            </div>
        </div>--}}
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-block btn-primary">Valider</button>
        </div>
    </div>
   
</form>
@endsection