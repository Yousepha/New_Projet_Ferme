@extends('layouts.client_master')

@section('content')

<!--**************************************************  debut  **********************************************************-->

<div class="card-deck">
  <div class="card shadow">
    <img class="card-img-top img-fluid" src="images/bovin/vachePetit.jpg">
    <div class="card-body">
      <p class="card-text">nom: Nana <br>description: race Hollande </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">2.500.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="card shadow">
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
  <div class="card shadow">
    <img class="card-img-top img-fluid" src="images/bovin/taureauS2.jpg">
    <div class="card-body">
      <p class="card-text">nom: Minet <br>description: race Italiane </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">1.000.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><span class="fa fa-eye"></span></a>
        </div>
    </div>
  </div>
  <div class="card shadow">
    <img class="card-img-top img-fluid" src="images/bovin/unVeau.jpg">
    <div class="card-body">
      <p class="card-text">nom: Ana <br>description: race Italiane-sud </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">1.050.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
    </div>
  </div>
</div>

<br>

<div class="card-deck">
  <div class="card shadow">
    <img class="card-img-top img-fluid" src="images/bovin/taureauS3.jpg">
    <div class="card-body">
      <p class="card-text_cl">nom: Lahna <br>description: race Pakistan </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">1.250.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
    </div>
  </div>
  <div class="card shadow">
    <img class="card-img-top img-fluid" src="images/bovin/coupleBovin.jpg">
    <div class="card-body">
      <p class="card-text_cl">nom: kahona <br>description: race Indou </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">1.700.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
  <div class="card shadow">
    <img class="card-img-top img-fluid" src="images/bovin/velleS.jpg">
    <div class="card-body">
      <p class="card-text_cl">nom: kahona <br>description: race Indou </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">175.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
  <div class="card shadow">
    <img class="card-img-top img-fluid" src="images/lait/lait20l.jpg">
    <div class="card-body">
      <p class="card-text_cl">Lait pur<br>date expiration</p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">10.000 F</span>
        <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>
</div>

<br>

<div class="card-deck">
  <div class="card shadow">
    <img class="card-img-top img-fluid" src="images/lait/lait5l.jpg">
    <div class="card-body">
      <p class="card-text_cl">Lait pur<br>date expiration</p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">3.000 F</span>
        <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
  <div class="card shadow">
    <img class="card-img-top img-fluid" src="images/lait/lait1l.jpg">
    <div class="card-body">
      <p class="card-text_cl">Lait pur <br>date expiration </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">600 F</span>
        <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><span class="fa fa-eye"></span></a>
      </div>
    </div>
  </div>
  <div class="card shadow">
    <img class="card-img-top img-fluid" src="images/lait/lait0.5l.jpg">
    <div class="card-body">
      <p class="card-text_cl">Lait pur<br>date expiration </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">300 F</span>
        <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
  <div class="card shadow">
    <img class="card-img-top img-fluid" src="images/lait/seau20L.jpg">
    <div class="card-body">
      <p class="card-text_cl">Lait pur<br>date expiration </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">10.000 F</span>
        <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </div>
</div>
<!-- <style>
    /* * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    } */

    /* Float four columns side by side */
    .column_cl {
      float: left;
      width: 25%;
      padding: 0 10px;
    }

    /* Remove extra left and right margins, due to padding */
    .row_cl {
      margin: 0 -5px;
    }

    /* Clear floats after the columns */
    .row_cl:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive column_cls */
    @media screen and (max-width: 600px) {
      .column_cl {
        width: 100%;
        display: block;
        margin-bottom: 20px;
      }
    }

    /* Style the counter cards */
    .card_cl {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      padding: 16px;
      margin: 16px;
      text-align: center;
      display : block;
      background-color: #f1f1f1;
    }

    img {
      width: 100px;
      height: 100px;
    }
  </style>
  <h1 style="text-align:center;">Nos vache et produit produits Laitières</h1>

  <div class="column_cl">
    <div class="card_cl">
      <img src="images/bovin/vachePetit.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <p class="card-text_cl">nom: Nana <br>description: race Hollande </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">2.500.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>

  <div class="column_cl">
    <div class="card_cl">
      <img src="images/bovin/VacheS1.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body_cl">
        <p class="card-text_cl">nom: Nini <br>description: race Hollande </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">700.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="column_cl">
    <div class="card_cl">
      <img src="images/bovin/taureauS2.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body_cl">
        <p class="card-text_cl">nom: Minet <br>description: race Italiane </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">1.000.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><span class="fa fa-eye"></span></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column_cl">
    <div class="card_cl">
      <img src="images/bovin/unVeau.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body_cl">
        <p class="card-text_cl">nom: Ana <br>description: race Italiane-sud </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">1.050.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column_cl">
    <div class="card_cl">
      <img src="images/bovin/taureauS3.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body_cl">
        <p class="card-text_cl">nom: Lahna <br>description: race Pakistan </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">1.250.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column_cl">
    <div class="card_cl">
      <img src="images/bovin/coupleBovin.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body_cl">
        <p class="card-text_cl">nom: kahona <br>description: race Indou </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">1.700.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column_cl">
    <div class="card_cl">
      <img src="images/bovin/velleS.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body_cl">
        <p class="card-text_cl">nom: kahona <br>description: race Indou </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">175.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column_cl">
    <div class="card_cl">
      <img src="images/lait/lait20l.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body_cl">
        <p class="card-text_cl">Lait pur<br>date expiration</p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">10.000 F</span>
          <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="column_cl">
    <div class="card_cl">
      <img src="images/lait/lait5l.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body_cl">
        <p class="card-text_cl">Lait pur<br>date expiration</p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">3.000 F</span>
          <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column_cl">
    <div class="card_cl">
      <img src="images/lait/lait1l.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body_cl">
        <p class="card-text_cl">Lait pur <br>date expiration </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">600 F</span>
          <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><span class="fa fa-eye"></span></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column_cl">
    <div class="card_cl">
      <img src="images/lait/lait0.5l.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body_cl">
        <p class="card-text_cl">Lait pur<br>date expiration </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">300 F</span>
          <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column_cl">
    <div class="card_cl">
      <img src="images/lait/seau20L.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body_cl">
        <p class="card-text_cl">Lait pur<br>date expiration </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">10.000 F</span>
          <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  </div> -->

  <!--**************************************************   fin   ************************************************************-->

@endsection