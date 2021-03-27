@extends('layouts.master')
@section('content')

<style>
    .container{
        padding:0.5%;
    }
</style>
<div class="container">
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span> Gestion du personnel </span></h2>

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
        <a href="{{ route('employee.create') }}" class="btn btn-default">
        <span class="fa fa-plus-circle"> Ajouter un Nouveau Employé</span></a>
    </div>
    <table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
        <tr class="text-center">
            <th width="10%">Photo</th>
            <th >Nom</th>
            <th >Prenom</th>
            <th >Telephone</th>
            <th >Adresse</th>
            <th >Login</th>
            <!-- <th >password</th> -->
            <th >Salaire</th>
            <th >profile</th>
            <th >Action</th>
        </tr>
        @foreach($data as $employee)
        <tbody style="color:black; font:blod; background:#ffff">
            <tr class="text-center">
                <td><img src="{{ URL::to('/') }}/images/{{ $employee->photo }}" class="rounded-circle" width="60" height="50" /></td>
                <td>{{ $employee->nom }}</td>
                <td>{{ $employee->prenom }}</td>
                <td>{{ $employee->telephone }}</td>
                <td>{{ $employee->adresse }}</td>
                <td>{{ $employee->login }}</td>
                <!-- <td>{{ $employee->password }}</td> -->
                <td>{{ $employee->salaire }} Fcfa</td>
                <td>{{ $employee->profile }}</td>
                <td width="25%">
                <!-- here is the button action side where you can edit . view and delete the employee record -->
                <form action="{{ route('employee.destroy', $employee->id) }}" method="post">
                <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span> </a>
                <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Editer</a>
                    
                    @csrf
                    @method('DELETE')
                    <!-- <a href="{{ route('employee.destroy', $employee->id) }}" class="delete-confirm btn btn-sm btn-danger"><span class="fa fa-trash"></span> Supprimer</a> -->
                    <button type="submit" class="btn btn-sm btn-danger delete-confirm"><span class="fa fa-trash"></span></button>
                </form>
                <!-- ends here -->
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div class="pagination-block">
                            
        {{  $data->appends(request()->input())->links('layouts.paginationlinks') }}
    </div>
    
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