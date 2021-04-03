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
            <h2 class="alert alert-dark text-center" style="color:red; text:bold">Créer une nouvelle Vente</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary fa fa-reply-all" href="{{ route('ventebovins.index') }}"> Retour</a>
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
   
<form action="{{ route('ventebovins.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row card shadow">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mettre en ligne:</strong>
                <select  name="enLigne" id="etatSante" class="form-control" required>
                    <option>pas en ligne</option>
                    <option>en ligne</option>
                    
                </select>
                <span style="color:red">@error('enLigne') {{$message}} @enderror</span>
            
            </div>
        </div>
        {{----}}
        
        <!--  -->
        <div class="form-group col-md-12">
            <!-- <div class="row"> -->
                <label for=""><strong>Choisir le Bovin:</strong></label>
                <div class="">
                    <select name="bovin_id" class="form-control" required>

                        @foreach($bovins as $bovin)
                        <option value="{{ $bovin->idBovin }} ">
                            {{ $bovin->codeBovin }} {{$bovin->nom}}  
                        </option>
                        @endforeach
                    </select>
                </div>
                <span style="color:red">@error('bovin_id') {{$message}} @enderror</span>

                <div class="clearfix"></div>
            <!-- </div> -->
        </div>
        <!--  -->

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix Bovin :</strong>
                <input type="number" name="prixBovin" class="form-control" placeholder="Prix" value="{{ old('prixBovin') }}">
                <span style="color:red">@error('prixBovin') {{$message}} @enderror</span>
            
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
            <input type="file" name="photo" id="image" class="form-control" onchange="previewFile(this)">
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