@extends('layouts.layout_fermier')
@section('content')

<style>
    .container{
        padding:0.5%;
    }
</style>
<div class="container">
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span> Aliments dans le stock </span></h2>

    @if($message = Session::get('Success'))
    <div class="alert alert-success">
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif

    @if($message = Session::get('error'))
    <div class="alert alert-danger">
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif

    </div>
    <table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
        <tr class="text-center">
            <th >Nom Aliment</th>
            <th >Quantite</th>
        </tr>
        @foreach($data as $stocks)
        <tbody style="color:black; font:blod; background:#ffff">
            <tr class="text-center">
                <td>{{ $stocks->nomAliment }}</td>
                <td>{{ $stocks->quantite }} kg</td>
                {{-- <td width="25%"> 
                <!-- here is the button action side where you can edit . view and delete the stocks record -->
                <!-- <form action="{{ route('stocks.destroy', $stocks->id) }}" method="post">
                <a href="{{ route('stocks.show', $stocks->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span> Montrer</a>
                <a href="{{ route('stocks.edit', $stocks->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Editer</a>
                    
                    @csrf
                    @method('DELETE')
                    <!-- <a href="{{ route('stocks.destroy', $stocks->id) }}" class="delete-confirm btn btn-sm btn-danger"><span class="fa fa-trash"></span> Supprimer</a> -->
                    <button type="submit" class="btn btn-sm btn-danger delete-confirm"><span class="fa fa-trash"></span></button>
                </form> --}}
                <!-- ends here -->
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div class="pagination-block">
                            
        {{  $data->appends(request()->input())->links('layouts.paginationlinks') }}
    </div><hr>
    <h4>La quantite total de l'aliment est de : {{ $quantiteTotale }} kg</h4>
    
    <hr>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
    $('.delete-confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Confirmez-vous la suppression ?`,
            text: "Cet enregistrement et ses détails seront définitivement supprimés!",
            icon: "warning",
            buttons: true,
            buttons: ["Annuler", "Oui!"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            form.submit();
            }
        });
    });
    </script>
@endsection