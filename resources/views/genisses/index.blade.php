@extends('layouts.master')
@section('content')

<style>
    .container{
        padding:0.5%;
    }
</style>
<div class="container">
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fab fa-laravel"> Liste des Genisses </span></h2>

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
    <div align="right">
        <a href="{{ route('genisses.create') }}" class="btn btn-default btn-success">
        <span class="fa fa-plus-circle"> Ajouter un Nouveau Genisse</span></a>
    </div>
    <table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
        <tr class="text-center">
            <th width="10%">Photo</th>
            <th >Nom</th>
            <th >Race</th>
            <th >Date IA</th>
            <th >Phase</th>
            <th >codeBovin</th>
            <th >Etat</th>
            <th >Date Naissance</th>
            <th >Etat Sante</th>
            <th >geniteur</th>
            <th >genitrice</th>
            <th >Action</th>
        </tr>
        @foreach($data as $genisses)
        <tbody style="color:black; font:blod; background:#ffff">
            <tr class="text-center">
                <td><img src="{{ URL::to('/') }}/images/{{ $genisses->photo }}" class="rounded-circle" width="60" height="50" /></td>
                <td>{{ $genisses->nom }}</td>
                <td>{{ $genisses->nomRace }}</td>
                <td>{{ $genisses->dateIA }}</td>
                <td>{{ $genisses->phase }}</td>
                <td>{{ $genisses->codeBovin }}</td>
                <td>{{ $genisses->etat }}</td>
                <td>{{ $genisses->dateNaissance }}</td>
                <td>{{ $genisses->etatDeSante }}</td>
                <td>{{ $genisses->geniteur }}</td>
                <td>{{ $genisses->genitrice }}</td>
                <td width="25%">
                <!-- here is the button action side where you can edit . view and delete the genisses record -->
                <form action="{{ route('genisses.destroy', $genisses->idBovin) }}" method="post">
                    <a href="{{ route('genisses.show', $genisses->idBovin) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span> </a>
                    <a href="{{ route('genisses.edit', $genisses->idBovin) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                    
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