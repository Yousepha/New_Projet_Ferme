@extends('layouts.master')

@section('content')
{{--@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif--}}
<style>
    .container{
        padding:0.5%;
    }
</style>
<div class="container">
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fab fa-laravel"> Gestion des clients </span></h2>
    <br>
    <h2 class="alert alert-success " > Modifier Client #{{$data->id}} <span class="fa fa-user" style="float:right"> {{$data->prenom}} {{$data->nom}}</span> </h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="post" action="{{ route('clients.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Extended default form grid -->
                <form>
                    <!-- Grid row -->
                    <div class="form-row">
                        
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Prénom</label>
                            <input mdbInput type="text" class="form-control" name="prenom" id="last_name" value="{{ $data->prenom }}">
                            <span style="color:red">@error('prenom') {{$message}} @enderror</span>
                        
                        </div>
                        
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Nom</label>
                            <input mdbInput type="text" class="form-control" name="nom" id="first_name" value="{{ $data->nom }}">
                            <span style="color:red">@error('nom') {{$message}} @enderror</span>

                        </div>
                        
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Email</label>
                            <input mdbInput type="text" class="form-control" name="email" id="first_name" value="{{ $data->email }}">
                            <span style="color:red">@error('email') {{$message}} @enderror</span>

                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Téléphone</label>
                            <input mdbInput type="number" oninput="this.value = Math.abs(this.value)" class="form-control" name="telephone" id="gender" value="{{ $data->telephone}}">
                            <span style="color:red">@error('telephone') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Adresse</label>
                            <input mdbInput type="text" class="form-control" name="adresse" id="email" value="{{ $data->adresse }}">
                            <span style="color:red">@error('adresse') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Login</label>
                            <input mdbInput type="text" class="form-control" name="login" id="phone" value="{{ $data->login }}">
                            <span style="color:red">@error('login') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Mot de passe</label>
                            <input mdbInput type="password" class="form-control" name="password" id="phone" value="{{ $data->password }}" disable>
                            <span style="color:red">@error('password') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Profile</label>
                            <input mdbInput type="text" class="form-control" name="profile" id="phone" value="{{ $data->profile }}">
                            <span style="color:red">@error('profile') {{$message}} @enderror</span>
                        
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="" class="col-md-6">Photo</label>
                                <input type="file" name="photo" id="image" class="form-control" onchange="previewFile(this)">
                                <span style="color:red">@error('photo') {{$message}} @enderror</span>
                            
                            </div>
                            <div class="form-group col-md-3">
                                <img id="previewImg" src="{{ URL::to('/') }}/images/{{ $data->photo }}" class="rounded-circle" width="70" />
                                <input type="hidden" name="hidden_image" value="{{ $data->photo }}" />
                            </div>
                        </div>
                    </div>
                    <!-- Grid row -->
                    <a href="{{ route('clients.index') }}" class="btn btn-warning">Annuler</a>
                    <button type="submit"  name="add" class="btn btn-info input-lg">Ajouter client</button>
                </form>
                <!-- Extended default form grid -->
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewFile(input){
    var file=$("input[type=file]").get(0).files[0];
    if(file){
        var reader = new FileReader();
        reader.onload = function(){
            $('#previewImg').attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
}
</script>
<script>
 //---------------------Browse image----------------
 $('#browse_file').on('click',function(){
    $('#image').click();                 
})
$('#image').on('change', function(e){
    showFile(this, '#showImage');
})

</script>

@endsection