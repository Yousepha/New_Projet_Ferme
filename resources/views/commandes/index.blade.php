@extends('layouts.master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Liste des Commandes de Bovins !</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('paniers') }}"> Retour</a>
            </div>
        </div>
    </div>

    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert" type="button">x</button>
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif

    @if($message = Session::get('error'))
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert" type="button">x</button>
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif
   
    <table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
        <tr class="text-center">
        <th width="10%">Photo Bovin</th>
            <th>Prénom & nom</th>
            <th>Telephone</th>
            <th>Prix Total</th>
            <th>Date</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($data_bovin as $bovins)
        <tbody style="color:black; font:blod; background:#ffff">
            <tr class="text-center">
                <td><img src="{{ URL::to('/') }}/images/{{ $bovins->photo }}" class="rounded-circle" width="60" height="50" /></td>
                <td>{{ $bovins->prenom }} {{ $bovins->nomclient }}</td>
                <td>{{ $bovins->telephone }}</td>
                <td>{{ $bovins->prixBovin }} Fcfa</td>
                <td>{{ $bovins->dateVenteBovin }}</td>
                
                <td width="25%">
                   <a class="btn btn-info" href="{{ route('commandes.show',$bovins->idCom) }}"><span class="fa fa-eye">voir </span></a>
    
                </td>
            </tr>
        </tbody> 
        @endforeach
        <tfoot>
            <tr class="text-center" style="color:black; font:blod; background:#ffff">
                
                <td colspan="4"></td>
                              
                <td>Montant Total: {{ $montantTotale }} Fcfa</td>
                <td>Total: {{ $nb_com }} Commande(s)</td>
                
            </tr>
        </tfoot>
    </table>
    
    <div class="pagination-block">
                            
        {{  $data_bovin->appends(request()->input())->links('layouts.paginationlinks') }}
    </div>
  
@endsection