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
    <h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fab fa-laravel"> Gestion des Vaches </span></h2>
    <br>
    <h2 class="alert alert-success " > Modifier VACHE #{{$data->idBovin}} <span class="fa fa-cow" style="float:right"> {{$data->nom}}  {{$vachs[0]->codeBovin}}</span> </h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="post" action="{{ route('vaches.update', $data->idBovin) }}" enctype="multipart/form-data">
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

                        
                        <!--  -->
                        <div class="form-group col-md-6">
                                <label for="race">Nom Periode</label>
                                <div class="">
                                    <select name="nomPeriode" class="form-control" required>
                                    <option value="{{ $periodes[0]->nomPeriode }} "

                                        @if($periodes[0]->idPeriode == $periodes[0]->nomPeriode)
                                        selected
                                        @endif

                                        >
                                        {{ $periodes[0]->nomPeriode }}
                                        </option>
                                        @if($periodes[0]->nomPeriode == "lactation")
                                        <option>tarissement</option>
                                        @endif
                                        @if($periodes[0]->nomPeriode == "tarissement")
                                        <option>lactation</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                        </div>
                        <!--  -->

                        <!--  -->
                        <div class="form-group col-md-6">
                                <label for="race">Phase</label>
                                <div class="">
                                    <select name="phase" class="form-control" required>
                                        <option value="{{ $periodes[0]->phase }} "

                                            @if($periodes[0]->idPeriode == $periodes[0]->phase)
                                            selected
                                            @endif

                                        >
                                        {{ $periodes[0]->phase }}
                                        </option>
                                        @if($periodes[0]->phase == "gestant")
                                        <option>non gestant</option>
                                        @endif
                                        @if($periodes[0]->phase == "non gestant")
                                        <option>gestant</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                        </div>
                        <!--  -->

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
                                        <option value="{{ $data->etatDeSante }} "

                                            @if($data->idBovin == $data->etatDeSante)
                                            selected
                                            @endif
                                        
                                        >
                                            {{ $data->etatDeSante }}
                                        </option>
                                        @if($data->etatDeSante == "Sain")
                                            <option>Malade</option>
                                        @endif
                                        @if($data->etatDeSante == "Malade")
                                            <option>Sain</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            
                            <!--  -->
                        </div>

                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="genitrice">Situation</label>
                            <div class="">
                                <select name="situation" class="form-control" required>
                                    <option value="{{ $data->situation }} "

                                        @if($data->idBovin == $data->situation)
                                        selected
                                        @endif
                                    
                                    >
                                        {{ $data->situation }}
                                    </option>
                                    @if($data->situation == "pas en vente")
                                        <option>en vente</option>
                                    @endif
                                    @if($data->situation == "en vente")
                                        <option>pas en vente</option>
                                    @endif
                                </select>
                            </div>

                        </div>

                        <!--  -->
                        <div class="form-group col-md-6">
                                <label for="race">Race de la Vache</label>
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
                            <label for="prix">Prix</label>
                            <input mdbInput type="text" class="form-control" name="prix" id="prix" value="{{ $data->prix }}">
                            <span style="color:red">@error('prix') {{$message}} @enderror</span>
                        
                        </div>

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
                    <a href="{{ route('vaches.index') }}" class="btn btn-warning">Annuler</a>
                    <button type="submit"  name="add" class="btn btn-info input-lg">Ajouter Vache</button>
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