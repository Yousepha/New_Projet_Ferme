@extends('/layouts.master')

@section('content')
<div class="d-flex justify-content-center align-items-center text-white card" style="background-color:#2f323a;">


<form style="margin-left: 0 auto; width: 600px;">
  {{ csrf_field() }}
 
    <div class="form-row col-md-12 center ">
      <label for="inputEmail4">Nom</label>
      <input type="email" class="form-control" id="inputEmail4">
    </div>
  
      
    <div class="form-row  col-md-12 center">
      <label for="inputPassword4">Prénom</label>
      <input type="password" class="form-control" id="inputPassword4">
    </div>
    

  
  <div class="form-row col-md-12 center">
    <label for="inputDateNaiss">Téléphone</label>
    <input type="date" class="form-control" id="inputDateNaiss" placeholder="">
  </div>
  <div class="form-row col-md-12 center">
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
    
  <div class="center">
    <button type="submit" class="btn btn-success m-4">Enregistrer</button>
  </div>
  

</form>
</div>
@endsection