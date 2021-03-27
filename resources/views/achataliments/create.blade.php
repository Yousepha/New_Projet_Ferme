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
            <h2 class="alert alert-dark text-center" style="color:red; text:bold">Créer l'achat aliment</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary fa fa-reply-all" href="{{ route('achataliments.index') }}"> Retour</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Avertissement!</strong>Veuillez vérifier votre code d'entrée<br><br>
        {{-- <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>--}}
    </div>
@endif
   
<form action="{{ route('achataliments.store') }}" method="POST">
    @csrf
     <div class="row card shadow">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Date Achat Aliment:</strong>
                <input type="date" name="dateAchatAliment" class="form-control" placeholder="Date achat aliment" value="{{ old('dateAchatAliment') }}">
                <span style="color:red">@error('dateAchatAliment') {{$message}} @enderror</span>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nom Aliment:</strong>
                <input type="text" name="nomAliment" class="form-control" placeholder="Nom Aliment"  value="{{ old('nomAliment') }}">
                <span style="color:red">@error('nomAliment') {{$message}} @enderror</span>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Quantité:</strong>
                <input type="number" name="quantite" class="form-control" placeholder="Quantité"  value="{{ old('quantite') }}">
                <span style="color:red">@error('quantite') {{$message}} @enderror</span>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Montant:</strong>
                <input type="number" name="montant" class="form-control" placeholder="Montant"  value="{{ old('montant') }}">
                <span style="color:red">@error('montant') {{$message}} @enderror</span>

            </div>
        </div>
        <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-block">Valider</button>
        </div>
    </div>
   
</form>
@endsection