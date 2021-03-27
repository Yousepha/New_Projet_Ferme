@extends('/layouts.master')

@section('content')
<div class="d-flex justify-content-center align-items-center text-white card" style="background-color:#2f323a;">


<form style="margin-left: 0 auto; width: 600px;">
  {{ csrf_field() }}
 
    <div class="form-row col-md-12 center ">
      <label for="inputEmail4">Date Dépence</label>
      <input type="date" class="form-control" id="inputEmail4">
    </div>
  
      
    <div class="form-row  col-md-12 center">
      <label for="inputPassword4">Type</label>
      <input type="text" class="form-control" id="inputPassword4">
    </div>
  
  <div class="form-row col-md-12 center">
    <label for="inputDateNaiss">Libellé</label>
    <input type="text" class="form-control" id="inputDateNaiss" placeholder="">
  </div>
 
  <div class="form-row col-md-12 center">
    <label for="inputDateNaiss">Montant</label>
    <input type="number" class="form-control" id="inputDateNaiss" placeholder="">
  </div>


  <div class="center">
    <button type="submit" class="btn btn-success m-2">Enregistrer</button>
  </div>
  

</form>
</div>
@endsection