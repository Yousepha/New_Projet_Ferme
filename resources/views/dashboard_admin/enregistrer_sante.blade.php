@extends('/layouts.master')

@section('content')
<div class="d-flex justify-content-center align-items-center text-white card" style="background-color:#2f323a;">


<form style="margin-left: 0 auto; width: 600px;">
  {{ csrf_field() }}
 
    <div class="form-row col-md-12 center ">
      <label for="inputMaladie">Nom Maladie</label>
      <input type="email" class="form-control" id="inputMaladie">
    </div>
  
      
    <div class="form-row  col-md-12 center">
      <label for="inputDateMaladie">Date Maladie</label>
      <input type="date" class="form-control" id="inputDateMaladie">
    </div>
    

  
  <div class="form-row col-md-12 center">
    <label for="inputDateNaiss">Date Guérison</label>
    <input type="date" class="form-control" id="inputDateNaiss" placeholder="">
  </div>
  
    
  <div class="center">
    <button type="submit" class="btn btn-success m-2">Enregistrer</button>
  </div>
  

</form>
</div>
@endsection