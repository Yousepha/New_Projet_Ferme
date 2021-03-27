@extends('layouts.client_master')
@section('content')

<section class="py-5 text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Produits en</span> <br> <span class="badge badge-primary ">Promotion </span></h1>
        

    </div>
</section>

<div class="card-deck">
  <div class="card">
    <img class="card-img-top img-fluid" src="images/bovin/VacheS1.jpg">
    <div class="card-body">
      <p class="card-text">nom: Nini <br>description: race Hollande </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">700.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top img-fluid" src="images/bovin/unVeau.jpg">
    <div class="card-body">
      <p class="card-text">nom: Ana <br>description: race Italiane-sud </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">1.050.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top img-fluid" src="images/lait/lait20l.jpg">
    <div class="card-body">
      <p class="card-text">Lait pur<br>date expiration</p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">10.000 F</span>
        <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top img-fluid" src="images/lait/lait1l.jpg">
    <div class="card-body">
      <p class="card-text">Lait pur <br>date expiration </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">600 F</span>
        <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><span class="fa fa-eye"></span></a>
      </div>
    </div>
  </div>
</div>

<br>

<!-- <div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="images/bovin/VacheS1.jpg">
    <div class="card-body">
      <h4 class="card-title">Tigre 1</h4>
      <p class="card-text">Une tigre dans une posture intéressante.</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="images/bovin/VacheS1.jpg">
    <div class="card-body">
      <h4 class="card-title">Tigre 2</h4>
      <p class="card-text">Deux tigres se faisant des calins.</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="images/bovin/VacheS1.jpg">
    <div class="card-body">
      <h4 class="card-title">Tigre 3</h4>
      <p class="card-text">Un tigre dont on se demande s'il va continuer à dormir ou se jeter précipitamment sur une proie.</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="images/bovin/VacheS1.jpg">
    <div class="card-body">
      <h4 class="card-title">Tigre 3</h4>
      <p class="card-text">Un tigre dont on se demande s'il va continuer à dormir ou se jeter précipitamment sur une proie.</p>
    </div>
  </div>
</div> -->

<!-- <div class="column">
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

</div> -->
@endsection