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
            <h2 class="alert alert-dark text-center" style="color:red; text:bold">Créer la dépense</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary fa fa-reply-all" href="{{ route('autresdepenses.index') }}"> Retour</a>
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
   
<form action="{{ route('autresdepenses.store') }}" method="POST">
    @csrf
     <div class="row card shadow">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Date Dépense:</strong>
                <input type="date" name="dateDepenses" class="form-control" placeholder="Date Dépense" value="{{ old('dateDepenses') }}">
                <span style="color:red">@error('dateDepenses') {{$message}} @enderror</span>
           
            </div>
        </div>
        {{--<div class="col-md-12">
            <div class="form-group">
                <strong>Type:</strong>
                <input type="text" name="type" class="form-control" placeholder="Type" value="{{ old('dateDepenses') }}">
                <span style="color:red">@error('type') {{$message}} @enderror</span>
            
            </div>
        </div>--}}

        <!-- Default input -->
        <div class="form-group col-md-12">
            <!-- <div class="row"> -->
                <label for="type" class=""><strong>Choisir le type</strong></label>
                <div class="">
                    <select name="type" class="form-control" required>
                        @foreach($types as $type)
                        <option value="{{ $type->nomType }} ">
                            {{ $type->nomType }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
            <!-- </div> -->
        </div>
        <!--  -->

        <div class="col-md-12">
            <div class="form-group">
                <strong>Montant:</strong>
                <input type="number" oninput="this.value = Math.abs(this.value)" name="montant" class="form-control" placeholder="Montant"  value="{{ old('montant') }}">
                <span style="color:red">@error('montant') {{$message}} @enderror</span>
            
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Libelle:</strong>
                <textarea class="form-control" style="height:80px" name="libelle" placeholder="Libelle">{{ old('libelle') }}</textarea>
                <span style="color:red">@error('libelle') {{$message}} @enderror</span>
            
            </div>
        </div>
        <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-block btn-primary">Valider</button>
        </div>
    </div>
   
</form>
@endsection