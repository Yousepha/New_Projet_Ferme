@extends('/layouts.master')
    
@section('content')

<h4>Modifier un personnel</h4>
<section style="padding-top:60px;">

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card-header">
                    Modification de personnels
                </div>
                <div class="card-body">
                    @if(Session::has('personnel_a_jour')) 
                        <div class="alert-success" role="alert">
                            {{Session::get('personnel_a_jour')}}
                        </div>          
                    @endif
                    <form action="{{route('personnels.mise_a_jour')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="idUtilisateur" value="{{$personnels->idUtilisateur}}">
                        <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom" placeholder="Entrer le nom" value="{{ old('nom') }}">
                        <span style="color:red">@error('nom') {{$message}} @enderror</span>
                    </div>
                
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="prenom" placeholder="Entrer le prenom" value="{{ old('prenom') }}">
                        <span style="color:red">@error('prenom') {{$message}} @enderror</span>                   
                    </div>

                    <div class="form-group">
                        <label for="tel">Téléphone</label>
                        <input type="number" class="form-control" name="tel" placeholder="Entrer le num de tel" value="{{ old('tel') }}">
                        <span style="color:red">@error('tel') {{$message}} @enderror</span>
                    </div>
            
                    <div class="form-group">
                        <label for="photo">Choisir un Photo</label>
                        <input type="file" class="form-control" name="photo" placeholder="Entrer un photo" onchange="previewFile(this)" value="{{ old('photo') }}">
                        <img id="previewImg" alt="Image de personnel" style="max-width:130px;margin-top:20px;">
                        <span style="color:red">@error('photo') {{$message}} @enderror</span>
                    </div>
            
                    <div class="form-group">
                        <label for="profil">Profil</label>
                        <input type="text" class="form-control" name="profil" placeholder="Entrer la date de naissance" value="{{ old('profil') }}">
                        <span style="color:red">@error('profil') {{$message}} @enderror</span>                
                    </div>
                                      
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
                    </div>
                    <a href="{{ route('personnel.index') }}" class="btn btn-block btn-warning">Retour</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function previewFile(input){
        var file=$("input[type=file").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('#previewImg').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection('content')
