@extends('layouts.master')
  
@section('content')

<style>
    form {
    width: 50%;
    margin: 0 auto;
    }
</style>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="">
            <h2 class="alert alert-dark text-center" style="color:red; text:bold">Créer une nouvelle Vente de lait</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary fa fa-reply-all" href="{{ route('ventelaits.index') }}"> Retour</a>
        </div>
    </div>
</div>
   
{{--@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Avertissement!</strong>Veuillez vérifier votre code d'entrée<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif--}}
   
<form action="{{ route('ventelaits.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row card shadow">
        
        <!--  -->
        <div class="form-group col-md-12">
            <!-- <div class="row"> -->
                <label for=""><strong>Choisir capacité de la Bouteille:</strong></label>
                <div class="">
                    <select name="bouteille_id" class="form-control" required>

                        @foreach($bouteilles as $bouteille)
                        <option value="{{ $bouteille->idBouteille }} ">
                            {{ $bouteille->capacite }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <span style="color:red">@error('bouteille_id') {{$message}} @enderror</span>

                <div class="clearfix"></div>
            <!-- </div> -->
        </div>
        <!--  -->

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix Bouteille:</strong>
                <input type="number" name="prixBouteille" class="form-control" placeholder="Prix Bouteille" value="{{ old('prixBouteille') }}">
                <span style="color:red">@error('prixBouteille') {{$message}} @enderror</span>
            
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Bouteille:</strong>
                <input type="number" name="nbrBouteille" class="form-control" placeholder="Nombre Bouteille" value="{{ old('nbrBouteille') }}">
                <span style="color:red">@error('nbrBouteille') {{$message}} @enderror</span>
            
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description :</strong>
                <textarea class="form-control" style="height:80px" name="description" placeholder="description">{{ old('description') }}</textarea>
                <span style="color:red">@error('description') {{$message}} @enderror</span>
            
            </div>
        </div>
        

        <div class="form-group col-md-6">
            <label for = "image" class=""><strong>La Photo</strong></label>
            <input type="file" name="photo" id="image" class="form-control" onchange="previewFile(this)" value="{{ old('photo') }}">
            <img id="previewImg" alt="Image" class="rounded-circle" width="70" >
            <span style="color:red">@error('photo') {{$message}} @enderror</span>
        
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-block btn-primary">Valider</button>
        </div>
    </div>
   
</form>

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