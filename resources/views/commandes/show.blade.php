@extends('layouts.master')
 
@section('content')

    <div class="row">

        <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-0">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Commande N° {{ $data_bovin[0]->idCom}}</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a class="btn btn-primary fa fa-reply-all" href="{{ route('liste_commandes') }}"> Retour</a>
                    </div>

                </div>
            </div>
            <div class="table-responsive">
                <div class="jumbotron">
                    <h1 class="display-6">Prénom & Nom : {{ $data_bovin[0]->prenom }} {{ $data_bovin[0]->nomclient }}</h1>
                    <p class="lead">Adresse : {{ $data_bovin[0]->adresse }}</p>
                    <p>Téléphone : {{ $data_bovin[0]->telephone }}</p>
                    <p>Date Commande : {{ $data_bovin[0]->dateVenteBovin }}</p>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>P.U TTC</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        
                        <td>
                            <img src="{{ URL::to('/') }}/images/{{ $data_bovin[0]->photo }}" class="rounded-circle" width='120' height="100" />
                        </td>
                        <td>1</td>
                        <td>{{ $data_bovin[0]->prixBovin }} Fcfa</td>
                        <td class="text-right"> {{ $data_bovin[0]->prixBovin }} Fcfa TTC</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    
                    <tr>
                        <td colspan="2"></td>
                        <td>TOTAL</td>
                        <td class="text-right">{{ $data_bovin[0]->prixBovin }} Fcfa TTC </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </main>
    </div>

</body>
</html>
@endsection