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
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Modifier la capacite de la bouteille</h2>
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
  
    <form action="{{ route('bouteilles.update',$data->idBouteille) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row jumbotron text-white bg-dark">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Capacite:</strong>
                    <input type="number" name="capacite" value="{{ $data->capacite }}" class="form-control">
                    <span style="color:red">@error('capacite') {{$message}} @enderror</span>
                
                </div>
            </div>
        
            <!--  -->
            {{--<div class="form-group col-md-12">
                <label for="race"><strong>Nom Maladie</strong></label>
                <div class="">
                    <select name="idMaladie" class="form-control" required>
                        @foreach($maladies as $maladie[0])
                        <option value="{{ $maladie[0]->idMaladie }}"

                            @if($maladie[0]->idMaladie == $maladies[0]->maladie_id)
                            selected
                            @endif
                        
                        >
                            {{ $maladie[0]->nomMaladie }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>--}}
            <!--  -->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-block btn-primary">Valider</button>
            </div>
        </div>
   
    </form>
@endsection