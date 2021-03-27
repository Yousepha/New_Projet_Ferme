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
            <h2 class="alert alert-dark text-center" style="color:red; text:bold">Créer une nouvelle Bouteille</h2>
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
   
<form action="{{ route('bouteilles.store') }}" method="POST">
    @csrf
     <div class="row jumbotron text-white bg-dark">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Capacite:</strong>
                <input type="number" name="capacite" class="form-control" placeholder="Capacite"  value="{{ old('capacite') }}">
                <span style="color:red">@error('capacite') {{$message}} @enderror</span>
            
            </div>
        </div>
        
        <!--  -->
        {{--<div class="form-group col-md-12">
            <!-- <div class="row"> -->
                <label for="" class="col-md-6"><strong>Choisir le Stock</strong></label>
                <div class="">
                    <select name="idStock" class="form-control" required>

                        @foreach($stoklaits as $stoklait)
                        <option value="{{ $stoklait->idStock }} ">
                            {{ $stoklait->nomstoklait }}
                        </option>
                        @endforeach

                    </select>
                </div>
                <div class="clearfix"></div>
            <!-- </div> -->
        </div>--}}
        <!--  -->

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-block btn-primary">Valider</button>
        </div>
    </div>
   
</form>
@endsection