@extends('layouts.master')
  
@section('content')

<!-- <style>
.form-center input{
    align: center;
}

</style> -->

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="">
            <h2 class="alert alert-dark text-center" style="color:red; text:bold">Créer la dépense</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('autresdepenses.index') }}"> Retour</a>
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
     <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <strong>Date Dépense:</strong>
                <input type="date" name="dateDepenses" class="form-control" placeholder="Date Dépense" value="{{ old('dateDepenses') }}">
                <span style="color:red">@error('dateDepenses') {{$message}} @enderror</span>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Type:</strong>
                <input type="text" name="type" class="form-control" placeholder="Type" value="{{ old('type') }}">
                <span style="color:red">@error('type') {{$message}} @enderror</span>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Montant:</strong>
                <input type="number" name="montant" class="form-control" placeholder="Montant" value="{{ old('montant') }}">
                <span style="color:red">@error('montant') {{$message}} @enderror</span>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Libelle:</strong>
                <textarea class="form-control" style="height:80px" name="libelle" placeholder="Libelle">{{ old('Libelle')</textarea>
                <span style="color:red">@error('libelle') {{$message}} @enderror</span>

            </div>
        </div>
        <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </div>
   
</form>
@endsection