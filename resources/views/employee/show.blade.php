@extends('layouts.master')

@section('content')

<style>
    .container{
        padding:0.5%;
    }
</style>
<div class="container">
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span> Gestion du personnel</span></h2>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <form class="form-horizontal">
                <fieldset>

                <!-- Form Name -->
                    <legend> Profile de l'employé <span class="fa fa">  {{ $data->prenom }} {{ $data->nom }} </span></legend>



                    <div class="jumbotron text-center">
                        <div align="center">
                            <img src="{{ URL::to('/') }}/images/{{ $data->photo }}" class="rounded-circle" width='120' height="100" />
                            <div align="center">
                                <h3><span >Nom :</span> <i>{{ $data->nom }} </i> </h3>
                                <h3><span>Prenom  </span>  <i>{{ $data->prenom }}</i> </h3>
                                <h3>telephone     : <i>{{ $data->telephone }}</i>  </h3>
                                <h3>adresse      : <i>{{ $data->adresse }}</i></h3>
                                <h3>login      : <i>{{ $data->login }}</i></h3>
                                <h3>password      : <i>{{ $data->password }}</i></h3>
                                <h3>Salaire      : <i>{{ $fermier[0]->salaire }} Fcfa</i></h3>
                                <h3>profile      : <i>{{ $data->profile }}</i></h3>
                            </div>
                            <a href="{{ route('employee.index') }}" class="btn bg-dark" style="color:white">Retour</a>

                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection

