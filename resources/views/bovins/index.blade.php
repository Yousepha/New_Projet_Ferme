@extends('layouts.master')
@section('content')

<style>
    .container{
        padding:0.5%;
    }

    img.displayed {
    display: block;
    margin-left: auto;
    margin-right: auto; 
    /* border-radius: 50%; */
    }
</style>


<div class="container">
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fab fa-laravel"> Liste de l'ensemble des bovins de la ferme </span></h2>
</div>

<img class="card card-common shadow displayed" src="images/bovin/genisses.jpg" alt="...">



    <div align="right">
    </div>
    <!--  -->
    <div class="row text-center">
        <div class="col-md-4" style="margin-top:40px">
            <h4>Faites des Recherches ici</h4>
            <form action="{{ route('web.find') }}" method="GET">

                <div class="form-group">
                    <label for="">Entrez le mot clef</label>
                    <input type="text" class="form-control" name="query" placeholder="rechercher ici...." value="{{ request()->input('query') }}">
                    <span class="text-danger">@error('query'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Recherchez</button>
                </div>
            </form>
            
        </div>
    </div>
<!--  -->

    
    @if(isset($data))
    <table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
        <tr class="text-center">
            <th width="10%">Photo</th>
            <th >Nom</th>
            <th >Race</th>
            <th >codeBovin</th>
            <th >Etat</th>
            <th >Date de Naissance</th>
            <th >Etat De Sante</th>
            <th >geniteur</th>
            <th >genitrice</th>
        </tr>
        <!--  -->
        @if(count($data) > 0)
        @foreach($data as $bovins)
        <tbody style="color:black; font:blod; background:#ffff">
            <tr class="text-center">
                <td><img src="{{ URL::to('/') }}/images/{{ $bovins->photo }}" class="rounded-circle" width="60" height="50" /></td>
                <td>{{ $bovins->nom }}</td>
                <td>{{ $bovins->nomRace }}</td>
                <td>{{ $bovins->codeBovin }}</td>
                <td>{{ $bovins->etat }}</td>
                <td>{{ $bovins->dateNaissance }}</td>
                <td>{{ $bovins->etatDeSante }}</td>
                <td>{{ $bovins->geniteur }}</td>
                <td>{{ $bovins->genitrice }}</td>
                
            </tr>
        </tbody>
        @endforeach
        @else
            <tr><td>aucun résultat trouvé !</td></tr>
        @endif
    </table>
    <div class="pagination-block">
                            
        {{  $data->appends(request()->input())->links('layouts.paginationlinks') }}
    </div>{{-- --}}
    @endif
    
@endsection