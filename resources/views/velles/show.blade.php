@extends('layouts.master')

@section('content')

<style>
    .container{
        padding:0.5%;
    }
</style>
<div class="container">
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span> INFO du Velle</span></h2>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <form class="form-horizontal">
                <fieldset>

                <!-- Form Name -->
                    <legend> Information sur le velle <span class="fa fa"> {{ $data->nom }} </span></legend>



                    <div class="jumbotron text-center">
                        <div align="center">
                            <img src="{{ URL::to('/') }}/images/{{ $data->photo }}" class="rounded-circle" width='120' height="100" />
                            <div align="center">
                                <h3><span >Nom :</span> <i>{{ $data->nom }} </i> </h3>
                                <h3><span>codeBovin : </span>  <i>{{ $velle[0]->codeBovin }}</i> </h3>
                                <h3><span>nomRace : </span>  <i>{{ $races[0]->nomRace }}</i> </h3>
                                <h3>Etat     : <i>{{ $data->etat }}</i>  </h3>
                                <h3>situation     : <i>{{ $data->situation }}</i>  </h3>
                                <h3>Prix     : <i>{{ $data->prix }} Fcfa</i>  </h3>
                                <h3>Date de Naissance      : <i>{{ $data->dateNaissance }}</i></h3>
                                <h3>Etat De Santé      : <i>{{ $data->etatDeSante }}</i></h3>
                                <h3>Geniteur      : <i>{{ $data->geniteur }}</i></h3>
                                <h3>Genitrice      : <i>{{ $data->genitrice }}</i></h3>
                            </div>
                            <a href="{{ route('velles.index') }}" class="btn bg-dark" style="color:white">Retour</a>

                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection

