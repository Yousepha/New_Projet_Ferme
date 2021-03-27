@extends('layouts.client_master')
@section('content')

<style>
img{
  width:200px;
  height:200px;
}
</style>

<h1 style="text-align:center;">Nos vache et produit produits Laitières</h1>

<!-- <div class="column">
  <div class="card">
    <img src="images/bovin/vachePetit.jpg" class="card-img-top img-fluid" alt="Responsive image">
    <p class="card-text">nom: Nana <br>description: race Hollande </p>
    <div class="d-flex justify-content-between align-items-center">
      <span class="price">2.500.000 F</span>
      <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>
      </a>
    </div>
  </div>
</div>

<div class="column">
  <div class="card">
    <img src="images/bovin/VacheS1.jpg" class="card-img-top img-fluid" alt="Responsive image">
    <div class="card-body">
      <p class="card-text">nom: Nini <br>description: race Hollande </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">700.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="column">
  <div class="card">
    <img src="images/bovin/taureauS2.jpg" class="card-img-top img-fluid" alt="Responsive image">
    <div class="card-body">
      <p class="card-text">nom: Minet <br>description: race Italiane </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">1.000.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><span class="fa fa-eye"></span></a>
      </div>
    </div>
  </div>
</div>

<div class="column">
  <div class="card">
    <img src="images/bovin/unVeau.jpg" class="card-img-top img-fluid" alt="Responsive image">
    <div class="card-body">
      <p class="card-text">nom: Ana <br>description: race Italiane-sud </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">1.050.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
</div>

<div class="column">
  <div class="card">
    <img src="images/bovin/taureauS3.jpg" class="card-img-top img-fluid" alt="Responsive image">
    <div class="card-body">
      <p class="card-text">nom: Lahna <br>description: race Pakistan </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">1.250.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
</div>

<div class="column">
  <div class="card">
    <img src="images/bovin/coupleBovin.jpg" class="card-img-top img-fluid" alt="Responsive image">
    <div class="card-body">
      <p class="card-text">nom: kahona <br>description: race Indou </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">1.700.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
</div>

<div class="column">
  <div class="card">
    <img src="images/bovin/velleS.jpg" class="card-img-top img-fluid" alt="Responsive image">
    <div class="card-body">
      <p class="card-text">nom: kahona <br>description: race Indou </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">175.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
</div>

<div class="column">
  <div class="card">
    <img src="images/lait/lait20l.jpg" class="card-img-top img-fluid" alt="Responsive image">
    <div class="card-body">
      <p class="card-text">Lait pur<br>date expiration</p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">10.000 F</span>
        <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="column">
  <div class="card">
    <img src="images/lait/lait5l.jpg" class="card-img-top img-fluid" alt="Responsive image">
    <div class="card-body">
      <p class="card-text">Lait pur<br>date expiration</p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">3.000 F</span>
        <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
</div>

<div class="column">
  <div class="card">
    <img src="images/lait/lait1l.jpg" class="card-img-top img-fluid" alt="Responsive image">
    <div class="card-body">
      <p class="card-text">Lait pur <br>date expiration </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">600 F</span>
        <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><span class="fa fa-eye"></span></a>
      </div>
    </div>
  </div>
</div>

<div class="column">
  <div class="card">
    <img src="images/lait/lait0.5l.jpg" class="card-img-top img-fluid" alt="Responsive image">
    <div class="card-body">
      <p class="card-text">Lait pur<br>date expiration </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">300 F</span>
        <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
</div>

<div class="column">
  <div class="card">
    <img src="images/lait/seau20L.jpg" class="card-img-top img-fluid" alt="Responsive image">
    <div class="card-body">
      <p class="card-text">Lait pur<br>date expiration </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">10.000 F</span>
        <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
</div>

</div> -->
@endsection