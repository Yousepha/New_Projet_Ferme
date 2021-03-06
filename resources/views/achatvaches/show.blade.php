@extends('layouts.master')

@section('content')

<style>
    .container{
        padding:0.5%;
    }
</style>
<div class="container">
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span> INFO sur l'achat de la VACHE</span></h2>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <form class="form-horizontal">
                <fieldset>

                <!-- Form Name -->
                    <legend> Information sur l'achat de la Vache <span class="fa fa"> {{ $data->nom }} </span></legend>



                    <div class="jumbotron text-center">
                        <div align="center">
                            <img src="{{ URL::to('/') }}/images/{{ $data->photo }}" class="rounded-circle" width='120' height="100" />
                            <div align="center">
                                <h3><span >Nom :</span> <i>{{ $data->nom }} </i> </h3>
                                <h3><span>Code Bovin : </span>  <i>{{ $vachs[0]->codeBovin }}</i> </h3>
                                <h3><span>Race : </span>  <i>{{ $races[0]->nomRace }}</i> </h3>
                                <h3><span>Période : </span>  <i>{{ $periodes[0]->nomPeriode }}</i> </h3>
                                <h3><span>Phase : </span>  <i>{{ $periodes[0]->phase }}</i> </h3>
                                <h3>Etat     : <i>{{ $data->etat }}</i>  </h3>
                                <h3>Date de l'Achat      : <i>{{ $achat_vache[0]->dateAchatBovin }}</i></h3>
                                <h3>Montant de la Vache     : <i>{{ $achat_vache[0]->montantBovin }} Fcfa</i></h3>
                                <h3>Etat De Santé      : <i>{{ $data->etatDeSante }}</i></h3>
                            </div>
                            <a href="{{ route('achatvaches.index') }}" class="btn bg-dark" style="color:white">Retour</a>

                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection

