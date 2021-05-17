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
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Modifier la Vente de la bouteille</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('bouteilles.index') }}"> Retour</a>
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
    
    @if($message = Session::get('error'))
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert" type="button">x</button>
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif

  
    <form action="{{ route('bouteilles.update',$data->idBouteille) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row jumbotron text-white bg-dark">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Capacite:</strong>
                    <input type="number" oninput="this.value = Math.abs(this.value)" name="capacite" value="{{ $data->capacite }}" class="form-control">
                    <span style="color:red">@error('capacite') {{$message}} @enderror</span>
                
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre Bouteille:</strong>
                    <input type="number" min="1" name="nombreDispo" value="{{ $data->nombreDispo }}" oninput="this.value = Math.abs(this.value)" class="form-control">
                    <span style="color:red">@error('nombreDispo') {{$message}} @enderror</span>
               
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prix Bouteille:</strong>
                    <input type="number" min="0" name="prix" value="{{ $data->prix }}" oninput="this.value = Math.abs(this.value)" class="form-control">
                    <span style="color:red">@error('prix') {{$message}} @enderror</span>
               
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:80px" name="description">{{ $data->description }}</textarea>
                    <span style="color:red">@error('description') {{$message}} @enderror</span>
                
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="image"><strong>Image</strong></label>
                    <input type="file" name="photo" id="image" class="form-control" onchange="previewFile(this)">
                    <span style="color:red">@error('photo') {{$message}} @enderror</span>
                
                </div>
                <div class="form-group col-md-3">
                    <img id="previewImg" src="{{ URL::to('/') }}/images/{{ $data->photo }}" class="rounded-circle" width="70" />
                    <input type="hidden" name="hidden_image" value="{{ $data->photo }}" />
                </div>
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

$(document).ready(function() {
  $("input.positive-numeric-only").on("keydown", function(e) {
    var char = e.originalEvent.key.replace(/[^0-9^.^,]/, "");
    if (char.length == 0 && !(e.originalEvent.ctrlKey || e.originalEvent.metaKey)) {
      e.preventDefault();
    }
  });

  $("input.positive-numeric-only").bind("paste", function(e) {
    var numbers = e.originalEvent.clipboardData
      .getData("text")
      .replace(/[^0-9^.^,]/g, "");
    e.preventDefault();
    var the_val = parseFloat(numbers);
    if (the_val > 0) {
      $(this).val(the_val.toFixed(2));
    }
  });

  $("input.positive-numeric-only").focusout(function(e) {
    if (!isNaN(this.value) && this.value.length != 0) {
      this.value = Math.abs(parseFloat(this.value)).toFixed(2);
    } else {
      this.value = 0;
    }
  });
});

 //---------------------Browse image----------------
 $('#browse_file').on('click',function(){
    $('#image').click();                 
})
$('#image').on('change', function(e){
    showFile(this, '#showImage');
})

</script>
@endsection