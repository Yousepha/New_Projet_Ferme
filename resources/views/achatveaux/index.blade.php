@extends('layouts.master')
@section('content')

<style>
    .container{
        padding:0.5%;
    }
</style>
<div class="container">
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fa fa-money"> Liste des achats des veaux </span></h2>

    @if($message = Session::get('Success'))
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

    </div>
    <div class="pull-left">
        <a class="btn btn-primary fa fa-reply-all" href="{{ route('achatbovins') }}"> Retour</a>
    </div>
    <div align="right">
        <a href="{{ route('achatveaux.create') }}" class="btn btn-default btn-success">
        <span class="fa fa-plus-circle"> Ajouter un Nouveau Veau</span></a>
    </div>
    <table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
        <tr class="text-center">
            <th width="10%">Photo</th>
            <th >Nom</th>
            <th >Montant</th>
            <th >Date de l'Achat</th>
            <th >Race</th>
            <th >codeBovin</th>
            <th >Etat</th>
            <th >Date de Naissance</th>
            <th >Etat De Sante</th>
            <!-- <th >geniteur</th>
            <th >genitrice</th> -->
            <th >Action</th>
        </tr>
        @foreach($data as $achatveaux)
        <tbody style="color:black; font:blod; background:#ffff">
            <tr class="text-center">
                <td><img src="{{ URL::to('/') }}/images/{{ $achatveaux->photo }}" class="rounded-circle" width="60" height="50" /></td>
                <td>{{ $achatveaux->nom }}</td>
                <td>{{ $achatveaux->montantBovin }} Fcfa</td>
                <td>{{ $achatveaux->dateAchatBovin }}</td>
                <td>{{ $achatveaux->nomRace }}</td>
                <td>{{ $achatveaux->codeBovin }}</td>
                <td>{{ $achatveaux->etat }}</td>
                <td>{{ $achatveaux->dateNaissance }}</td>
                <td>{{ $achatveaux->etatDeSante }}</td>
                <!-- <td>{{ $achatveaux->geniteur }}</td>
                <td>{{ $achatveaux->genitrice }}</td> -->
                <td width="25%">
                <!-- here is the button action side where you can edit . view and delete the achatveaux record -->
                <form action="{{ route('achatveaux.destroy', $achatveaux->idBovin) }}" method="post">
                    <a href="{{ route('achatveaux.show', $achatveaux->idBovin) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span> Voir </a>
                    <a href="{{ route('achatveaux.edit', $achatveaux->idBovin) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Editer</a>
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger delete-confirm"><span class="fa fa-trash"></span> </button>
                </form>
                <!-- ends here -->
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div class="pagination-block">
                            
        {{  $data->appends(request()->input())->links('layouts.paginationlinks') }}
    </div>{{-- --}}
    
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