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
            <h2 class="alert alert-dark text-center" style="color:red; text:bold">Créer la Pesée</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary fa fa-reply-all" href="{{ route('pesages.index') }}"> Retour</a>
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
   
<form action="{{ route('pesages.store') }}" method="POST">
    @csrf
     <div class="row jumbotron text-white bg-dark">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Poids:</strong>
                <input type="number" oninput="this.value = Math.abs(this.value)" name="poids" class="form-control" placeholder="Poids" value="{{ old('poids') }}">
                <span style="color:red">@error('poids') {{$message}} @enderror</span>
            
            </div>
        </div>
        {{--<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Pesée:</strong>
                <input type="date" name="datePesee" class="form-control" placeholder="Date Pesée" value="{{ old('datePesee') }}">
                <span style="color:red">@error('datePesee') {{$message}} @enderror</span>
            
            </div>
        </div>--}}
        <!--  -->
        <div class="form-group col-md-12">
            <!-- <div class="row"> -->
                <label for="race" class="col-md-6"><strong>Choisir le Bovin</strong></label>
                <div class="">
                    <select name="idBovin" class="form-control" required>
                        <!-- <option selected>Choisir la Race de la vache</option> -->
                        @foreach($bovins as $bovin)
                        <option value="{{ $bovin->idBovin }} ">
                            {{ $bovin->nom }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
            <!-- </div> -->
        </div>
        <!--  -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-block">Valider</button>
        </div>
    </div>
   
</form>
@endsection