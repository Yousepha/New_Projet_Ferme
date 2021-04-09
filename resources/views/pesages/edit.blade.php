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
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Modifier la pesée de {{ $bovins[0]->nom }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('pesages.index') }}"> Retour</a>
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
  
    <form action="{{ route('pesages.update',$data->idPesage) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row jumbotron text-white bg-dark">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Poids:</strong>
                    <input type="number" oninput="this.value = Math.abs(this.value)" name="poids" value="{{ $data->poids }}" class="form-control">
                    <span style="color:red">@error('poids') {{$message}} @enderror</span>
                
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date Pesée:</strong>
                    <input type="date" name="datePesee" value="{{ $data->datePesee }}" class="form-control">
                    <span style="color:red">@error('datePesee') {{$message}} @enderror</span>
                
                </div>
            </div>
        
            <!--  -->
            <div class="form-group col-md-12">
                <label for="race"><strong>Nom Bovin</strong></label>
                <div class="">
                    <select name="idBovin" class="form-control" required>
                        @foreach($bovins as $bovin[0])
                        <option value="{{ $bovin[0]->idBovin }}"

                            @if($bovin[0]->idBovin == $bovins[0]->bovin_id)
                            selected
                            @endif
                        
                        >
                            {{ $bovin[0]->nom }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--  -->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary btn-block">Valider</button>
            </div>
        </div>
   
    </form>
@endsection