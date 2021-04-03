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
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Modifier la Vente du Bovin {{ $bovins[0]->nom }}</h2>
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
  
    <form action="{{ route('ventebovins.update',$data->idVenteBovin) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row card shadow">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mettre en ligne:</strong>
                    <div class="">
                        <select name="enLigne" class="form-control" required>
                            <option value="{{ $data->enLigne }} "

                                @if($data->idBovin == $data->enLigne)
                                selected
                                @endif
                            
                            >
                                {{ $data->enLigne }}
                            </option>
                            @if($data->enLigne == "pas en ligne")
                                <option>en ligne</option>
                            @endif
                            @if($data->enLigne == "en ligne")
                                <option>pas en ligne</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            {{----}}

            <!--  -->
            <div class="form-group col-md-12">
                <label for="race"><strong>Nom Bovin:</strong></label>
                <div class="">
                    <select name="bovin_id" class="form-control" required>
                        @foreach($bovins as $bovin[0])
                        <option value="{{ $bovin[0]->idBovin }}"

                            @if($bovin[0]->idBovin == $bovins[0]->bovin_id)
                            selected
                            @endif
                        
                        >
                            {{ $bovin[0]->nom }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--  -->            

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:80px" name="description">{{ $bovins[0]->description }}</textarea>
                    <span style="color:red">@error('description') {{$message}} @enderror</span>
                
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prix Bovin:</strong>
                    <input type="number" name="prixBovin" value="{{ $data->prixBovin }}" class="form-control">
                    <span style="color:red">@error('prixBovin') {{$message}} @enderror</span>
                
                </div>
            </div>
        

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="image"><strong>Image</strong></label>
                    <input type="file" name="photo" id="image" class="form-control" onchange="previewFile(this)">
                    <span style="color:red">@error('photo') {{$message}} @enderror</span>
                
                </div>
                <div class="form-group col-md-3">
                    <img id="previewImg" src="{{ URL::to('/') }}/images/{{ $bovins[0]->photo }}" class="rounded-circle" width="70" />
                    <input type="hidden" name="hidden_image" value="{{ $bovins[0]->photo }}" />
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
 //---------------------Browse image----------------
 $('#browse_file').on('click',function(){
    $('#image').click();                 
})
$('#image').on('change', function(e){
    showFile(this, '#showImage');
})

</script>

@endsection