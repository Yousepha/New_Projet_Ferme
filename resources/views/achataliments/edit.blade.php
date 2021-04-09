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
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Modifier l'achat aliment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('achataliments.index') }}"> Retour</a>
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
  
    <form action="{{ route('achataliments.update',$data->idAchatAliment) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row card shadow">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Date Achat Aliment:</strong>
                    <input type="date" name="dateAchatAliment" value="{{ $data->dateAchatAliment }}" class="form-control">
                    <span style="color:red">@error('dateAchatAliment') {{$message}} @enderror</span>

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nom Aliment:</strong>
                    <input type="text" name="nomAliment" value="{{ $data->nomAliment }}" class="form-control">
                    <span style="color:red">@error('nomAliment') {{$message}} @enderror</span>

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Quantité:</strong>
                    <input type="number" name="quantite" value="{{ $data->quantite }}" oninput="this.value = Math.abs(this.value)" class="form-control">
                    <span style="color:red">@error('quantite') {{$message}} @enderror</span>
                
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Montant:</strong>
                    <input type="number" name="montant" value="{{ $data->montant }}" oninput="this.value = Math.abs(this.value)" class="form-control">
                    <span style="color:red">@error('montant') {{$message}} @enderror</span>
               
                </div>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary btn-block">Valider</button>
            </div>
        </div>
   
    </form>
@endsection