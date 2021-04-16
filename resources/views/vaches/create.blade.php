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
    <h2 class="alert alert-success text-center color:red">ENREGISTREZ VOTRE NOUVELLE VACHE ICI</h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="post" action="{{ route('vaches.store') }}" enctype="multipart/form-data">

                @csrf

                <!-- Extended default form grid -->
                <form>
                    <!-- Grid row -->
                    <div class="form-row jumbotron " style="background-color:#8aa;">
                        
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="nom" class="col-md-6">Nom </label>
                            <input mdbInput type="text" id="nom" class="form-control" name="nom" id="last_name" placeholder="Nom" value="{{ old('nom') }}">
                            <span style="color:red">@error('nom') {{$message}} @enderror</span>
                        
                        </div>

                        <!--  -->
                        <div class="form-group col-md-6">
                            <!-- <div class="row"> -->
                                <label for="" class="col-md-6">Nom Periode</label>
                                <div class="">
                                    <select name="nomPeriode" class="form-control" required>
                                        <!-- <option selected>Choisir la Race de la vache</option> -->
                                        <option>lactation</option>
                                        <option>tarissement</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            <!-- </div> -->
                        </div>
                        <!--  -->

                        <!--  -->
                        <div class="form-group col-md-6">
                            <!-- <div class="row"> -->
                                <label for="" class="col-md-6">Phase</label>
                                <div class="">
                                    <select name="phase" class="form-control" required>
                                        <!-- <option selected>Choisir la Race de la vache</option> -->
                                        <option>gestant</option>
                                        <option>non gestant</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            <!-- </div> -->
                        </div>
                        <!--  -->

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <!-- <input mdbInput type="text" class="form-control" name="etat" id="gender" placeholder="Etat"> -->
                            <label for="" class="col-md-6"> Choisir l'état</label>
                            
                            <select  name="etat" class="form-control" required>
                                <option>Vivant</option>
                                <option>Mort</option>
                                
                            </select>
                        </div>
                        
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="etatSante" class="col-md-6"> Choisir la situation</label>
                            
                            <select  name="situation" id="etatSante" class="form-control" required>
                                <option>pas en vente</option>
                                <option>en vente</option>
                                
                            </select>
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="dateNaiss" class="col-md-6">Date de Naissance</label>
                            <input mdbInput type="date" id="dateNaiss" class="form-control" name="dateNaissance" id="email" placeholder="Date Naissance" value="{{ old('dateNaissance') }}">
                            <span style="color:red">@error('dateNaissance') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                        {{-- <input mdbInput type="text" class="form-control" name="etatDeSante" id="phone" placeholder="Etat De Sante">--}}                           
                            <label for="etatSante" class="col-md-6"> Choisir l'état de Santé</label>
                            
                            <select  name="etatDeSante" id="etatSante" class="form-control" required>
                                <option>Sain</option>
                                <option>Malade</option>
                                
                            </select>
                        </div>

                        <!--  -->
                        <div class="form-group col-md-6">
                            <!-- <div class="row"> -->
                                <label for="" class="col-md-6">Race de la vache</label>
                                <div class="">
                                    <select name="race_id" class="form-control" required>
                                        <!-- <option selected>Choisir la Race de la vache</option> -->
                                        @foreach($races as $race)
                                        <option value="{{ $race->idRace }} ">
                                            {{ $race->nomRace }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            <!-- </div> -->
                        </div>
                        <!--  -->

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="prix" class="col-md-6">Le Prix</label>
                            <input mdbInput oninput="this.value = Math.abs(this.value)" type="number" id="prix" class="form-control" name="prix"  autocomplete="prix" placeholder="Prix" value="{{ old('prix') }}">
                            <span style="color:red">@error('prix') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="geniteur" class="col-md-6">Le géniteur</label>
                            <input mdbInput type="text" id="geniteur" class="form-control" name="geniteur" id="phone" placeholder="Geniteur" value="{{ old('geniteur') }}">
                            <span style="color:red">@error('geniteur') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="genitrice" class="col-md-6">La génitrice</label>
                            <input mdbInput type="text" id="genitrice" class="form-control" name="genitrice" id="phone" placeholder="Genitrice" value="{{ old('genitrice') }}">
                            <span style="color:red">@error('genitrice') {{$message}} @enderror</span>
                        
                        </div>

                        
                        <div class="form-group col-md-3">
                            <label for = "image" class="col-md-6">La Photo</label>
                            <input type="file" name="photo" id="image" class="form-control" onchange="previewFile(this)" value="{{ old('photo') }}">
                            <img id="previewImg" alt="Image" class="rounded-circle" width="70" >
                            <span style="color:red">@error('photo') {{$message}} @enderror</span>
                        
                        </div>

                    </div>
                        <!-- Grid row -->
                        <a href="{{ route('vaches.index') }}" class="btn btn-warning">Annuler</a>
                        <button type="submit"  name="add" class="btn btn-info input-lg">Ajouter une Vache</button>
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
 //---------------------Browse image----------------
 $('#browse_file').on('click',function(){
        $('#image').click();                 
    })
    $('#image').on('change', function(e){
        showFile(this, '#showImage');
})

</script>

@endsection