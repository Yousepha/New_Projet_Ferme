@extends('/layouts.master')

@section('content')
<div class="d-flex justify-content-center align-items-center text-white card" style="background-color:#2f323a;">


<form style="margin-left: 0 auto; width: 600px;">
  {{ csrf_field() }}
    
  <div class="form-row col-md-12 center">
    <label for="inputNomVache">Nom Vache</label>
    <input type="text" class="form-control" id="inputNomVache" placeholder="">
  </div>

    <div class="form-row col-md-12 center">
        <label for="inputCatégorie">Nom Période</label>
        <select id="inputCatégorie" class="form-control">
        <option selected></option>
        <option>Gestation</option>
        <option>Non Gestation</option>
        </select>
    </div>  

    <div class="form-row col-md-12 center">
        <label for="inputCatégorie">Phase</label>
        <select id="inputCatégorie" class="form-control">
        <option selected></option>
        <option>Lactation</option>
        <option>Tarissement</option>
        </select>
    </div>
    
  <div class="center">
    <button type="submit" class="btn btn-success m-2">Enregistrer</button>
  </div>
  

</form>
</div>
@endsection