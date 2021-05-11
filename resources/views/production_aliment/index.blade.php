@extends('layouts.master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Production de lait journalière des vaches !</h2>
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
            <th>Fermier</th>
            <th>Nom Vache</th>
            <th>Traite Matin</th>
            <th>Traite Soir</th>
            <th>Total</th>
            <th>Date Traite</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($data as $product_aliment)
        <tbody style="color:black; font:blod; background:#ffff">
            <tr class="text-center">
                <td>{{ $product_aliment->prenom }} {{ $product_aliment->nom }}</td>
                <td>{{ $product_aliment->nomvache }}</td>
                <td>{{ $product_aliment->traiteMatin }} Litres</td>
                <td>{{ $product_aliment->traiteSoir }} Litres</td>
                <td>{{ $product_aliment->traiteMatin + $product_aliment->traiteSoir}} Litres</td>
                <td>{{ $product_aliment->dateTraite }}</td>
                <td width="25%">
                    <a class="btn btn-info" href="{{ route('product_aliment.show',$product_aliment->idTraiteDuJour) }}"><span class="fa fa-eye"> Voir</a>
                </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    
    <div class="pagination-block">
                            
        {{  $data->appends(request()->input())->links('layouts.paginationlinks') }}
    </div>
 
@endsection