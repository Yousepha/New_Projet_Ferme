@extends('layouts.master')
@section('content')

<style>
    .container{
        padding:0.5%;
    }
</style>
<div class="container">
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fab fa-laravel"> Liste des Vaches </span></h2>

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

    <!-- FORMULAIRE DE RECHERCHE -->
    <!-- <form action="{{ route('web.search1') }}" class="form-inline ml-6" type="GET">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" name="query" type="search" placeholder="Recherche">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>

        <div class="input-group input-group-sm">
            <select name="query_select" id="" class="form-control form-control-navbar">
                <option value="nomPeriode">Nom Periode</option>
                <option value="phase">Phase</option>
            </select>
        </div>
    </form> -->

    <!--  -->
    </div>
    <div align="right">
        <a href="{{ route('vaches.create') }}" class="btn btn-default btn-success">
        <span class="fa fa-plus-circle"> Ajouter une nouvelle Vache</span></a>
    </div>
    <table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
        <tr class="text-center">
            <th width="10%">Photo</th>
            <th >Nom</th>
            <th >Race</th>
            <th >Periode</th>
            <th >Phase</th>
            <th >codeBovin</th>
            <th >Etat</th>
            <th >Date Naissance</th>
            <th >Etat Sante</th>
            <th >geniteur</th>
            <th >genitrice</th>
            <th >Action</th>
        </tr>
        @foreach($data as $vaches)
        <tbody style="color:black; font:blod; background:#ffff">
            <tr class="text-center">
                <td><img src="{{ URL::to('/') }}/images/{{ $vaches->photo }}" class="rounded-circle" width="60" height="50" /></td>
                <td>{{ $vaches->nom }}</td>
                <td>{{ $vaches->nomRace }}</td>
                <td>{{ $vaches->nomPeriode }}</td>
                <td>{{ $vaches->phase }}</td>
                <td>{{ $vaches->codeBovin }}</td>
                <td>{{ $vaches->etat }}</td>
                <td>{{ $vaches->dateNaissance }}</td>
                <td>{{ $vaches->etatDeSante }}</td>
                <td>{{ $vaches->geniteur }}</td>
                <td>{{ $vaches->genitrice }}</td>
                <td width="25%">
                <!-- here is the button action side where you can edit . view and delete the vaches record -->
                <form action="{{ route('vaches.destroy', $vaches->idBovin) }}" method="post">
                    <a href="{{ route('vaches.show', $vaches->idBovin) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span> </a>
                    <a href="{{ route('vaches.edit', $vaches->idBovin) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                    
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