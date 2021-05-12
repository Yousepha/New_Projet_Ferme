@extends('layouts.master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Consommation d'aliment par jour!</h2>
            </div>
            
            <!--  -->
   
            <form action="{{ route('search_production_aliment') }}" method="get">
                @csrf
                <br>
                <div class="container">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="form-group row">
                                <label for="date" class="col-form-label col-sm-2 text-right">Date de Début</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control input-sm" id="fromDate" name="fromDate">
                                    <span class="text-danger">@error('fromDate'){{ $message }} @enderror</span>

                                </div>
                                <label for="date" class="col-form-label col-sm-2 text-right">Date de Fin</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control input-sm" id="toDate" name="toDate">
                                    <span class="text-danger">@error('toDate'){{ $message }} @enderror</span>
                                
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn" name="search" title="Recherche"><i class="fa fa-2x fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!--  -->


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
            <th>Nom Aliment</th>
            <th>Quantite Aliment</th>
            <th>Date</th>
            <th width="250px">Action</th>
        </tr>
        @if(count($data) > 0)
        @foreach ($data as $product_aliment)
        <tbody style="color:black; font:blod; background:#ffff">
            <tr class="text-center">
                <td>{{ $product_aliment->prenom }} {{ $product_aliment->nom }}</td>
                <td>{{ $product_aliment->nomAlimentation }}</td>
                <td>{{ $product_aliment->quantite }} Kg</td>
                <td>{{ $product_aliment->date }} </td>
                <td width="25%">
                    <a class="btn btn-info" href="{{ route('product_aliment.show',$product_aliment->idAlimentation) }}"><span class="fa fa-eye"> Voir</a>
                </td>
            </tr>
        </tbody>
        @endforeach
        @else
            <tr><td style="color:black; font:blod; background:#ffff" class="text-center" colspan="5">aucun résultat trouvé !</td></tr>
        @endif
        </table>
    
    <div class="pagination-block">
                            
        {{  $data->appends(request()->input())->links('layouts.paginationlinks') }}
    </div>
 
@endsection