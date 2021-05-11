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

    <!--  -->

    <div class="card-body">
        <div class="mb-2">
            <form class="form-inline" action="{{ route('web.find') }}" method="GET">
                {{--@csrf--}}
                <label for="category_filter">Filtrer par Categorie &nbsp;</label>
                <select class="form-control" id="category_filter" name="query_select">
                    <option value="nom">Nom</option>
                    <option value="nomRace">Race</option>
                    <option value="etat">Etat</option>
                    <option value="etatDeSante">Santé</option>
                    <option value="codeBovin">Code Bovin</option>
                    <option value="situation">Situation</option>
                    <option value="geniteur">Geniteur</option>
                    <option value="genitrice">Genitrice</option>
                    <option value="dateNaissance">Date de Naissance</option>
                    
                </select>
                <label for="search_text">&nbsp;&nbsp;</label>
                <input type="search" class="form-control"  name="search_text" placeholder="Entrez le mot clef" id="search_text" value="{{ request()->input('search_text') }}">
                <span>&nbsp;</span> 
                <button type="submit" class="btn btn-primary" >Rechercher</button>
                <span>&nbsp;</span>
                <span class="text-danger">@error('search_text'){{ $message }} @enderror</span>

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
            <th >Situation</th>
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
                <td>{{ $bovins->situation }}</td>
                <td>{{ $bovins->dateNaissance }}</td>
                <td>{{ $bovins->etatDeSante }}</td>
                <td>{{ $bovins->geniteur }}</td>
                <td>{{ $bovins->genitrice }}</td>
                
            </tr>
        </tbody>
        @endforeach
        @else
            <tr><td style="color:black; font:blod; background:#ffff" class="text-center" colspan="10">aucun résultat trouvé !</td></tr>
        @endif
    </table>
    <div class="pagination-block">
                            
        {{  $data->appends(request()->input())->links('layouts.paginationlinks') }}
    </div>{{-- --}}
    @endif
    
@endsection