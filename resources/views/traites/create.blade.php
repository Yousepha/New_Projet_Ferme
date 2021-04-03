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
            <h2 class="alert alert-dark text-center" style="color:red; text:bold">Créer la Traite</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary fa fa-reply-all" href="{{ route('traites.index') }}"> Retour</a>
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
   
<form action="{{ route('traites.store') }}" method="POST">
    @csrf
     <div class="row jumbotron text-white bg-dark">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Traite Matin:</strong>
                <input type="number" name="traiteMatin" class="form-control" placeholder="Traite Matin" value="{{ old('traiteMatin') }}">
                <span style="color:red">@error('traiteMatin') {{$message}} @enderror</span>
            
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Traite Soir:</strong>
                <input type="number" name="traiteSoir" class="form-control" placeholder="Traite Soir" value="{{ old('traiteSoir') }}">
                <span style="color:red">@error('traiteSoir') {{$message}} @enderror</span>
            
            </div>
        </div>
        {{--<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Traite:</strong>
                <input type="date" name="dateTraite" class="form-control" placeholder="Date" value="{{ old('dateTraite') }}">
                <span style="color:red">@error('dateTraite') {{$message}} @enderror</span>
            
            </div>
        </div>--}}
        <!--  -->
        <div class="form-group col-md-12">
            <!-- <div class="row"> -->
                <label for="race" class="col-md-6"><strong>Choisir la vache</strong></label>
                <div class="">
                    <select name="idBovin" class="form-control" required>
                        <!-- <option selected>Choisir la Race de la vache</option> -->
                        @foreach($bovins as $vache)
                        <option value="{{ $vache->idBovin }} ">
                            {{ $vache->nom }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
            <!-- </div> -->
        </div>
        <!--  -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-block btn-primary">Valider</button>
        </div>
    </div>
   
</form>
@endsection