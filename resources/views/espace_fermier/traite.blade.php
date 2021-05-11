@extends('/layouts.layout_fermier')
    
@section('content')


<div class="d-flex justify-content-center align-items-center text-white card">


<form style="margin-left: 0 auto; width: 600px; background-color:#2f323a; ">
  {{ csrf_field() }}
 
    <div class="form-row col-md-12 center ">
      <label for="inputEmail4">Traite Matin</label>
      <input type="number" class="form-control" id="inputEmail4">
    </div>
  
      
    <div class="form-row  col-md-12 center">
      <label for="inputPassword4">Traite Soir</label>
      <input type="number" class="form-control" id="inputPassword4">
    </div>
    

  
  <div class="form-row col-md-12 center">
    <label for="inputDateNaiss">Date traite</label>
    <input type="date" class="form-control" id="inputDateNaiss" placeholder="">
  </div>
  <!-- <div class="form-row col-md-12 center">
    <label for="inputAddress2">Adresse</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Thiès">
  </div>
  <div class="form-row col-md-12 center">
    <label for="inputAddress2">Login</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Login">
  </div>
  <div class="form-row col-md-12 center">
    <label for="inputAddress2">Mot de passe</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="*************">
  </div>
  
    
    <div class="form-row col-md-12 center">
      <label for="inputState">Profil</label>
      <select id="inputState" class="form-control">
        <option selected></option>
        <option>Fermier</option>
        <option>Client</option>
        
      </select>
    </div>
     -->
  <div class="center">
    <button type="submit" class="btn btn-success m-4">Ajouter</button>
    <button type="submit" class="btn btn-danger m-4">Supprimer</button>
    <button type="submit" class="btn btn-primary m-4">Modifier</button>
  </div>
  

</form>
</div>
@endsection