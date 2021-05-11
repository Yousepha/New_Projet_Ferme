@extends('layouts.master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Production de lait journalière des vaches !</h2>
            </div>
            
            <!--  -->
   
            <form action="{{ route('search_production_lait') }}" method="get">
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
            <th>Nom Vache</th>
            <th>Traite Matin</th>
            <th>Traite Soir</th>
            <th>Total</th>
            <th>Date Traite</th>
            <th width="250px">Action</th>
        </tr>
        @if(count($data) > 0)
        @foreach ($data as $product_lait)
        <tbody style="color:black; font:blod; background:#ffff">
            <tr class="text-center">
                <td>{{ $product_lait->prenom }} {{ $product_lait->nom }}</td>
                <td>{{ $product_lait->nomvache }}</td>
                <td>{{ $product_lait->traiteMatin }} Litres</td>
                <td>{{ $product_lait->traiteSoir }} Litres</td>
                <td>{{ $product_lait->traiteMatin + $product_lait->traiteSoir}} Litres</td>
                <td>{{ $product_lait->dateTraite }}</td>
                <td width="25%">
                    <a class="btn btn-info" href="{{ route('product_lait.show',$product_lait->idTraiteDuJour) }}"><span class="fa fa-eye"> Voir</a>
                </td>
            </tr>
        </tbody>
        @endforeach
        <tfoot>
            <tr style="color:black; font:blod; background:#ffff">
                
                <td colspan="6"></td>
                @if(isset($stock))
                @if(count($stock) > 0)              
                <td>Stock lait disponible:{{ number_format($stock[0]->quantiteDispo, 2) }} litre(s)</td>
                @endif
                @endif
            </tr>
            <tr style="color:black; font:blod; background:#ffff">
                <td colspan="6"></td>
                @if(isset($stock))
                @if(count($stock) > 0)              
                <td class="bg-default">Stock Total:{{ number_format($stockTotale, 2) }} litre(s)</td>
                @endif
                @endif
            </tr>
        </tfoot>
        @else
            <tr><td style="color:black; font:blod; background:#ffff" class="text-center" colspan="7">aucun résultat trouvé !</td></tr>
        @endif
    </table>
    
    <div class="pagination-block">
                            
        {{  $data->appends(request()->input())->links('layouts.paginationlinks') }}
    </div>
 
@endsection