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
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Editer la traite</h2>
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
  
    <form action="{{ route('traites.update',$data->idTraiteDuJour) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row jumbotron text-white bg-dark">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Traite Matin:</strong>
                    <input type="number" name="traiteMatin" value="{{ $data->traiteMatin }}" class="form-control">
                    <span style="color:red">@error('traiteMatin') {{$message}} @enderror</span>
                
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Traite Soir:</strong>
                    <input type="number" name="traiteSoir" value="{{ $data->traiteSoir }}" class="form-control">
                    <span style="color:red">@error('traiteSoir') {{$message}} @enderror</span>
                
                </div>
            </div>
            {{--<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date Traite:</strong>
                    <input type="date" name="dateTraite" value="{{ $data->dateTraite }}" class="form-control">
                    <span style="color:red">@error('dateTraite') {{$message}} @enderror</span>
                
                </div>
            </div>--}}
            
            <!--  -->
            <div class="form-group col-md-12">
                <label for="race"><strong>Choisir la Vache</strong></label>
                <div class="">
                    <select name="idBovin" class="form-control" required>
                        @foreach($vaches as $vache[0])
                        <option value="{{ $vache[0]->idBovin }} "

                            @if($vache[0]->idBovin == $vaches[0]->bovin_id)
                            selected
                            @endif
                        
                        >
                            {{ $vache[0]->nom }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--  -->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-block btn-primary">Valider</button>
            </div>
        </div>
   
    </form>
@endsection