@extends('/layouts.master')

@section('content')
<div class="d-flex justify-content-center align-items-center text-white card" style="background-color:#2f323a;">


<form style="margin-left: 0 auto; width: 600px;">
  {{ csrf_field() }}
 
    <div class="form-row col-md-12 center ">
      <label for="inputCodeBovin">Code Bovin</label>
      <input type="text" class="form-control" id="inputCodeBovin">
    </div>
  
      
    <div class="form-row  col-md-12 center">
      <label for="inputNom">Nom</label>
      <input type="text" class="form-control" id="inputNom">
    </div>
    

  
  <div class="form-row col-md-12 center">
    <label for="inputDateNaiss">Date de Naissance</label>
    <input type="date" class="form-control" id="inputDateNaiss" placeholder="">
  </div>
  <div class="form-row col-md-12 center">
    <label for="inputEtatSante">Etat de santé</label>
    <input type="text" class="form-control" id="inputEtatSante" placeholder="Sain">
  </div>
  <div class="form-row col-md-12 center">
    <label for="inputNomTaureau">Nom Taureau</label>
    <input type="text" class="form-control" id="inputNomTaureau" placeholder="">
  </div>
  <div class="form-row col-md-12 center">
    <label for="inputNomVache">Nom Vache</label>
    <input type="text" class="form-control" id="inputNomVache" placeholder="">
  </div>
  
    
    <div class="form-row col-md-12 center">
      <label for="inputCatégorie">Catégorie</label>
      <select id="inputCatégorie" class="form-control">
        <option selected></option>
        <option>Vache</option>
        <option>Génisse</option>
        <option>Veau</option>
        <option>Taureau</option>
      </select>
    </div>
    
  <div class="center">
    <button type="submit" class="btn btn-success m-2">Enregistrer</button>
  </div>
  

</form>
</div>
@endsection