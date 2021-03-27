@extends('/layouts.master')
    
@section('content')

<h4>Tous les personnels</h4>
<section style="padding-top:60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card-header">
                    Tous les personnels <a href="/ajout_personnel" class="btn btn-success">Ajouter un nouveau</a>
                </div>
                <div class="card-body">
                    @if(Session::has('personnel_supprimer')) 
                        <div class="alert-success" role="alert">
                            {{Session::get('personnel_supprimer')}}
                        </div>          
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>nom</th>
                                <th>prenom</th>
                                <th>photo</th>
                                <th>telephone</th>
                                <th>adresse</th>
                                <th>Profil</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personnels as $personnel)
                                <tr>
                                    <td>{{$personnel->nom}}</td>
                                    <td>{{$personnel->prenom}}</td>
                                    <td><img src="{{asset('images')}}/{{$vache->photo}}" style="max-width:60px;"></td>
                                    <td>{{$personnel->telephone}}</td>
                                    <td>{{$personnel->adresse}}</td>
                                    <td>{{$personnel->profil}}</td>
                                    <td>
                                        <a href="/modifier_personnels/{{$personnel->idUtilisateur}}" class="btn btn-info">Modifier</a>
                                        <a href="/personnel_a_supprimer/{{$personnel->idUtilisateur}}" class="btn btn-danger">Supprimer</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection('content')
