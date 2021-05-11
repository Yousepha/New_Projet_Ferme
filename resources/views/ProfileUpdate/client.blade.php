@extends('layouts.client_master')

@section('content')

<style>
    .container{
        padding:0.5%;
    }
</style>
<div class="container">
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fab fa-laravel"> Gestion de profile </span></h2>
    <br>
    <h2 class="alert alert-success " > Modifier mon Compte <span class="fa fa-user" style="float:right"> {{$data[0]->prenom}} {{$data[0]->nom}}</span> </h2>
</div>
    @if($message = Session::get('Success'))
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert" type="button">x</button>
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="post" action="{{ route('update.profile.user', $data[0]->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Extended default form grid -->
                <form>
                    
                        <div style="width: 15%; margin: 0 auto;" class="row">
                            <div class="form-group col-md-4">
                                <img id="previewImg" src="{{ URL::to('/') }}/images/{{ $data[0]->photo }}" class="rounded-circle" width='120' height="100" />
                                <input type="hidden" name="hidden_image" value="{{ $data[0]->photo }}" />
                            </div>
                        </div>
                        <div style="width: 50%; margin: 0 auto;" class="form-group col-md-2">
                            <label for="" class="col-md-6">Photo</label>
                            <input type="file" name="photo" id="image" class="form-control" onchange="previewFile(this)">
                            <span style="color:red">@error('photo') {{$message}} @enderror</span>
                        
                        </div>
                        
                    <!-- Grid row -->
                    <div class="form-row jumbotron text-white" style="background-color:#112233;">

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Prénom</label>
                            <input mdbInput type="text" class="form-control" name="prenom" id="last_name" value="{{ $data[0]->prenom }}">
                            <span style="color:red">@error('prenom') {{$message}} @enderror</span>
                        
                        </div>
                        
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Nom</label>
                            <input mdbInput type="text" class="form-control" name="nom" id="first_name" value="{{ $data[0]->nom }}">
                            <span style="color:red">@error('nom') {{$message}} @enderror</span>

                        </div>
                        
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Email</label>
                            <input mdbInput type="text" class="form-control" name="email" id="first_name" value="{{ $data[0]->email }}">
                            <span style="color:red">@error('email') {{$message}} @enderror</span>

                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6 ">
                            <label for="" class="col-md-6">Téléphone</label>
                            
                            <table>
                                <tr >
                                    <td>
                                        <select class="form-control" style="width: 65px" name="num" id="">
                                            <option value="{{ substr($data[0]->telephone, 0, 2)}}">{{ substr($data[0]->telephone, 0, 2)}}</option>
                                            <option value="78"
                                                @if(substr($data[0]->telephone, 0, 2) == 78)
                                                style="display: none"
                                                @endif
                                            >78</option>
                                            <option value="77"
                                                @if(substr($data[0]->telephone, 0, 2) == 77)
                                                style="display: none"
                                                @endif
                                            >77</option>
                                            <option value="76"
                                                @if(substr($data[0]->telephone, 0, 2) == 76)
                                                style="display: none"
                                                @endif
                                            >76</option>
                                            <option value="75"
                                                @if(substr($data[0]->telephone, 0, 2) == 75)
                                                style="display: none"
                                                @endif
                                            >75</option>
                                            <option value="70"
                                                @if(substr($data[0]->telephone, 0, 2) == 70)
                                                style="display: none"
                                                @endif
                                            >70</option>
                                        </select>
                                    </td>
                                    <td class="col-md-6">
                                        <input  type="number" oninput="this.value = Math.abs(this.value)" class="form-control" name="telephone" id="gender" value="{{ substr($data[0]->telephone, 2) }}">
                                    
                                    </td>
                                </tr>
                            </table>
                            <span style="color:red">@error('telephone') {{$message}} @enderror</span>
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Adresse</label>
                            <input mdbInput type="text" class="form-control" name="adresse" id="email" value="{{ $data[0]->adresse }}">
                            <span style="color:red">@error('adresse') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Login</label>
                            <input mdbInput type="text" class="form-control" name="login" id="phone" value="{{ $data[0]->login }}">
                            <span style="color:red">@error('login') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Mot de passe</label>
                            <input mdbInput type="password" class="form-control" name="password" id="phone" value="{{ $data[0]->password }}">
                            <span style="color:red">@error('password') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        {{--<div class="form-group col-md-6">
                            <label for="" class="col-md-6">Profile</label>
                            <input mdbInput type="text" class="form-control" name="profile" id="phone" value="{{ $data[0]->profile }}">
                            <span style="color:red">@error('profile') {{$message}} @enderror</span>
                        
                        </div>--}}

                        
                    </div>
                    <!-- Grid row -->
                    <a href="{{ route('home') }}" class="btn btn-warning">Annuler</a>
                    <button type="submit"  name="add" class="btn btn-info input-lg">Appliquer</button>
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