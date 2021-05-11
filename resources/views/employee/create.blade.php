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
    <h2 class="alert alert-success text-center color:red">BIENVENUE!! CRÉEZ VOTRE NOUVEL EMPLOYÉ ICI</h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data" >

            @csrf

                <!-- Extended default form grid -->
                <form>
                    <!-- Grid row -->
                    <div class="form-row">

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Prénom</label>
                            <input mdbInput type="text" class="form-control" name="prenom" id="" placeholder="Prenom" value="{{ old('prenom') }}">
                            <span style="color:red">@error('prenom') {{$message}} @enderror</span>
                            
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Nom</label>
                            <input mdbInput type="text" class="form-control" name="nom" id="" placeholder="Nom" value="{{ old('nom') }}">
                            <span style="color:red">@error('nom') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Email</label>
                            <input mdbInput type="email" class="form-control" name="email" id="" placeholder="Email" value="{{ old('email') }}">
                            <span style="color:red">@error('email') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6 ">
                            <label for="" class="col-md-6">Téléphone</label>
                            
                            <table>
                                <tr >
                                    <td>
                                        <select class="form-control" style="width: 65px" name="num" id="">
                                            <option value="78">78</option>
                                            <option value="77">77</option>
                                            <option value="76">76</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input style="width: 425px" type="number" oninput="this.value = Math.abs(this.value)" class="form-control" name="telephone" id="gender">
                                    
                                    </td>
                                </tr>
                            </table>
                            <span style="color:red">@error('telephone') {{$message}} @enderror</span>
                        </div>


                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Adresse</label>
                            <input mdbInput type="text" class="form-control" name="adresse" id="" placeholder="Adresse" value="{{ old('adresse') }}">
                            <span style="color:red">@error('adresse') {{$message}} @enderror</span>
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Login</label>
                            <input mdbInput type="text" class="form-control" name="login" id="" placeholder="login" value="{{ old('login') }}">
                            <span style="color:red">@error('login') {{$message}} @enderror</span>
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Mot de passe</label>
                            <input mdbInput type="password" class="form-control" name="password" id="" placeholder="mot de passe" value="{{ old('password') }}">
                            <span style="color:red">@error('password') {{$message}} @enderror</span>
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="" class="col-md-6">Salaire</label>
                            <input mdbInput type="number" oninput="this.value = Math.abs(this.value)" class="form-control" name="salaire" id="" placeholder="Salaire" value="{{ old('salaire') }}">
                            <span style="color:red">@error('salaire') {{$message}} @enderror</span>
                        </div>

                        <!-- Default input -->
                        {{--<div class="form-group col-md-6">
                            <label for="" class="col-md-6">Profile</label>
                            <input mdbInput type="text" class="form-control" name="profile" id="" placeholder="profile" value="{{ old('profile') }}">
                            <span style="color:red">@error('profile') {{$message}} @enderror</span>
                        </div>--}}

                        <div class="form-group col-md-3">
                            <label for="image" class="col-md-6">Photo</label>
                            <input type="file" name="photo" id="image" class="form-control" onchange="previewFile(this)" value="{{ old('photo') }}">
                            <img id="previewImg" alt="Image" class="rounded-circle" width="70" >
                            <span style="color:red">@error('photo') {{$message}} @enderror</span>
                        </div>
                    </div>
                        <!-- Grid row -->
                        <a href="{{ route('employee.index') }}" class="btn btn-warning">Annuler</a>
                        <button type="submit"  name="add" class="btn btn-info input-lg">Ajouter un Employé</button>
                </form>
                <!-- Extended default form grid -->
                <!-- </div>
                </div> -->
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

$(function () {
  $('form').submit(function(event) {
    if (this.checkValidity() == false) {
      event.preventDefault()
      event.stopPropagation()
    }
    $(this).addClass("was-validated")
  })
})
 //---------------------Browse image----------------
 $('#browse_file').on('click',function(){
        $('#image').click();                 
    })
    $('#image').on('change', function(e){
        showFile(this, '#showImage');
})

</script>

@endsection