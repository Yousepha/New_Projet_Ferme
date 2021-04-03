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
            <h2 class="alert alert-dark text-center" style="color:red; text:bold">Créer un nouveau Diagnostic</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary fa fa-reply-all" href="{{ route('diagnosticfermiers.index') }}"> Retour</a>
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
   
<form action="{{ route('diagnosticfermiers.store') }}" method="POST">
    @csrf
     <div class="row jumbotron text-white bg-dark">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Maladie:</strong>
                <input type="date" name="dateMaladie" class="form-control" placeholder="Poids" value="{{ old('dateMaladie') }}">
                <span style="color:red">@error('dateMaladie') {{$message}} @enderror</span>
            
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Guérison:</strong>
                <input type="date" name="dateGuerison" class="form-control" placeholder="Date Pesée" value="{{ old('dateGuerison') }}">
                <span style="color:red">@error('dateGuerison') {{$message}} @enderror</span>
            
            </div>
        </div>
        
        <!--  -->
        <div class="form-group col-md-12">
            <!-- <div class="row"> -->
                <label for="" class="col-md-6"><strong>Choisir la Maladie</strong></label>
                <div class="">
                    <select name="idMaladie" class="form-control" required>

                        @foreach($maladies as $maladie)
                        <option value="{{ $maladie->idMaladie }} ">
                            {{ $maladie->nomMaladie }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
            <!-- </div> -->
        </div>
        <!--  -->
        
        <!--  -->
        <div class="form-group col-md-12">
            <!-- <div class="row"> -->
                <label for="race" class="col-md-6"><strong>Choisir le Bovin</strong></label>
                <div class="">
                    <select name="idBovin" class="form-control" required>

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

        <!--  -->
        <div class="form-group col-md-12">
            <!-- <div class="row"> -->
                <label for="race" class="col-md-6"><strong>L'état de Santé du Bovin</strong></label>
                <div class="">
                                                
                    <select  name="etatDeSante" id="etatSante" class="form-control" required>
                        <option>Malade</option>
                        <option>Guéri</option>
                        <!-- <option>Sain</option> -->
                        
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