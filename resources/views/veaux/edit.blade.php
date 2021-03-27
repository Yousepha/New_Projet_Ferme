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
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fab fa-laravel"> Gestion des Veaux </span></h2>
    <br>
    <h2 class="alert alert-success " > Modifier VEAU #{{$data->idBovin}} <span class="fa fa-cow" style="float:right"> {{$data->nom}}  {{ $veau[0]->codeBovin}}</span> </h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="post" action="{{ route('veaux.update', $data->idBovin) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Extended default form grid -->
                <form>
                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="nom">Nom</label>
                            <input mdbInput type="text" id="nom" class="form-control" name="nom"  value="{{ $data->nom }}">
                            <span style="color:red">@error('nom') {{$message}} @enderror</span>
                        
                        </div>
                        
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="genitrice">Etat</label>
                            <div class="">
                                <select name="etat" class="form-control" required>
                                    <option value="{{ $data->etat }} "

                                        @if($data->idBovin == $data->etat)
                                        selected
                                        @endif
                                    
                                    >
                                        {{ $data->etat }}
                                    </option>
                                    @if($data->etat == "Vivant")
                                        <option>Mort</option>
                                    @endif
                                    @if($data->etat == "Mort")
                                        <option>Vivant</option>
                                    @endif
                                </select>
                            </div>

                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="genitrice">Date de Naissance</label>
                            <input mdbInput type="date" class="form-control" name="dateNaissance" id="phone" value="{{ $data->dateNaissance }}">
                            <span style="color:red">@error('dateNaissance') {{$message}} @enderror</span>
                        
                        </div>
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <!--  -->
                                <label >Choisir l'état de Santé</label>
                                <div class="">
                                    <select name="etatDeSante" class="form-control" required>
                                        <!-- <option selected>Choisir la Race de la vache</option> -->
                                        {{-- @foreach($data as $race) --}}
                                        <option value="{{ $data->etatDeSante }} "

                                            @if($data->idBovin == $data->etatDeSante)
                                            selected
                                            @endif
                                        
                                        >
                                            {{ $data->etatDeSante }}
                                        </option>
                                        @if($data->etatDeSante == "Sain")
                                            <option>Malade</option>
                                            <option>Guéri</option>
                                        @endif
                                        @if($data->etatDeSante == "Malade")
                                            <option>Sain</option>
                                            <option>Guéri</option>
                                        @endif
                                        @if($data->etatDeSante == "Guéri")
                                            <option>Sain</option>
                                            <option>Malade</option>
                                        @endif

                                        {{-- @endforeach --}}
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            
                            <!--  -->
                        </div>

                        <!--  -->
                        <div class="form-group col-md-6">
                                <label for="race">Race du Veau</label>
                                <div class="">
                                    <select name="race_id" class="form-control" required>
                                        @foreach($races as $race)
                                        <option value="{{ $race->idRace }} "

                                            @if($race->idRace == $data->race_id)
                                            selected
                                            @endif
                                        
                                        >
                                            {{ $race->nomRace }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                        </div>
                        <!--  -->

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="geniteur">Géniteur</label>
                            <input mdbInput type="text" class="form-control" name="geniteur" id="phone" value="{{ $data->geniteur }}">
                            <span style="color:red">@error('geniteur') {{$message}} @enderror</span>
                        
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="genitrice">Génitrice</label>
                            <input mdbInput type="text" class="form-control" name="genitrice" id="phone" value="{{ $data->genitrice }}">
                            <span style="color:red">@error('genitrice') {{$message}} @enderror</span>
                        
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="genitrice">Image</label>
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
                    <a href="{{ route('veaux.index') }}" class="btn btn-warning">Annuler</a>
                    <button type="submit"  name="add" class="btn btn-info input-lg">Ajouter Veau</button>
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