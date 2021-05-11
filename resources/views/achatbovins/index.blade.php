@extends('/layouts.master')

@section('content')
<div class="jumbotron text-center">
<div class="card-deck container">
    <div class="card card-common shadow">
      <div class="inner">
        <img class="card-img-top img-fluid" src="images/bovins/vache.png">
      </div>
      <div class="card-body">
        <h4 class="card-title"> <a href="{{ route('achatvaches.index') }}"> <button class="btn btn-primary">Acheter</button></a> </h4>
        <p class="card-text"><strong>Vaches</strong></p>
      </div>
    </div>
    <div class="card card-common shadow">
      <div class="inner">
        <img class="card-img-top  img-fluid" src="images/bovins/taureau.png">
      </div>
      <div class="card-body">
        <h4 class="card-title"> <a href="{{ route('achattaureaux.index') }}"><button class="btn btn-primary">Acheter</button></a></h4>
        <p class="card-text"><strong>Taureaux</strong></p>
      </div>
    </div>
    <div class="card card-common shadow">
      <div class="inner">
        <img class="card-img-top img-fluid" src="images/bovins/genisse.png">
      </div>
      <div class="card-body">
        <h4 class="card-title"><a href="{{ route('achatgenisses.index') }}"><button class="btn btn-primary">Acheter</button></a></h4>
        <p class="card-text"><strong>Genisses</strong></p>
      </div>
    </div>
    <div class="card card-common shadow">
      <div class="inner">
        <img class="card-img-top img-fluid" src="images/bovins/veaux.png">
      </div>
      <div class="card-body">
        <h4 class="card-title"><a href="{{ route('achatveaux.index') }}"><button class="btn btn-primary">Acheter</button></a></h4>
        <p class="card-text"><strong>Veaux</strong></p>
      </div>
    </div>
    <div class="card card-common shadow">
      <div class="inner">
        <img class="card-img-top img-fluid" src="images/bovins/velle.jpg">
      </div>
      <div class="card-body">
        <h4 class="card-title"><a href="{{ route('achatvelles.index') }}"><button class="btn btn-primary">Acheter</button></a></h4>
        <p class="card-text"><strong>Velles</strong></p>
      </div>
    </div>
  </div>
</div>

<h1 class="text-center alert-dark"> <p class="fa fa-money"> Liste des ACHATS</p></h1>

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
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fab fa-laravel"> Liste de l'ensemble des achats des bovins de la ferme </span></h2>
</div>

    <!--  -->

    <div class="card-body">
        <div class="mb-2">
            <form class="form-inline" action="{{ route('web.find_achat') }}" method="GET">
                {{--@csrf--}}
                <label for="category_filter">Filtrer par Categorie &nbsp;</label>
                <select class="form-control" id="category_filter" name="query_select">
                    <option value="nom">Nom</option>
                    <option value="nomRace">Race</option>
                    <option value="codeBovin">Code Bovin</option>
                    <option value="dateAchatBovin">Date d'achat</option>
                    
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
            <th >Montant</th>
            <th >Date de l'Achat</th>
            <th >Race</th>
            <th >codeBovin</th>
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
                <td>{{ $bovins->montantBovin }} Fcfa</td>
                <td>{{ $bovins->dateAchatBovin }}</td>
                <td>{{ $bovins->nomRace }}</td>
                <td>{{ $bovins->codeBovin }}</td>
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