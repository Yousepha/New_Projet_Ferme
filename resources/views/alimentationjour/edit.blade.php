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
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Modifier la quantité de: {{ $achat_aliment[0]->nomAliment }}</h2>
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
  
    <form action="{{ route('alimentationjour.update',$data->idAlimentation) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row jumbotron text-white bg-dark">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom Aliment:</strong>
                    <div class="">
                    <select name="nomAlimentation" class="form-control" required>
                        @foreach($achat_aliment as $achat_al[0])
                        <option value="{{ $achat_al[0]->nomAliment }} "

                            @if($achat_al[0]->nomAliment == $achat_aliment[0]->nomAlimentation)
                            selected
                            @endif
                        
                        >
                            {{ $achat_al[0]->nomAliment }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <span style="color:red">@error('nomAlimentation') {{$message}} @enderror</span>
                
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quatite Aliment:</strong>
                    <input type="number" name="quantite" oninput="this.value = Math.abs(this.value)" value="{{ $data->quantite }}" class="form-control">
                    <span style="color:red">@error('quantite') {{$message}} @enderror</span>
                
                </div>
            </div>
            {{--<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="date" value="{{ $data->date }}" class="form-control" placeholder="date">
                    <span style="color:red">@error('date') {{$message}} @enderror</span>
                
                </div>
            </div>--}}
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary btn-block">Valider</button>
            </div>
        </div>
   
    </form>
@endsection