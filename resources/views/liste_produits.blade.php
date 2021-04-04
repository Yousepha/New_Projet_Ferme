@extends('layouts.master')
@section('content')

<h1>Listes des produits en lignes</h1>
  
<!-- <div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h2>zzzzzzzzzzzz<small class="text-muted">zzzzzzzzzz </small></h2>
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">Book your stay now at the most magnificent resort in the world!</p>
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="room">Room Type</label>
                            <select class="form-control" name="room_id">
                                youseph
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="guests">Number of guests</label>
                            <input class="form-control" name="num_of_guests" placeholder="1">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="arrival">Arrival</label>
                            <input type="date" class="form-control" name="arrival" placeholder="03/21/2020">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="departure">Departure</label>
                            <input type="date" class="form-control" name="departure" placeholder="03/23/2020">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Book it</button>
            </form>
        </div>
    </div>
</div> -->

<section class="pt-1 linear-g-w m-5">

    <h1 class="h1-section mr-auto text-primary" id="bovin">Nos animaux</h1>
    <div class="card-deck container">
        <div class="card shadow">
            <div class="inner">
                <img class="card-img-top img-fluid" src="images/bovins/vache.png">
            </div>
            <div class="card-body">
                <h4 class="card-title"><button class="btn btn-primary">Editer</button></h4>
                <p class="card-text">Nos vaches</p>
            </div>
        </div>
        <div class="card shadow">
            <div class="inner">
                <img class="card-img-top  img-fluid" src="images/bovins/taureau.png">
            </div>
        <div class="card-body">
            <h4 class="card-title"> <button class="btn btn-primary">Editer</button></h4>
            <p class="card-text">taureau</p>
        </div>
    </div>
    <div class="card shadow">
        <div class="inner">
            <img class="card-img-top img-fluid" src="images/bovins/genisse.png">
        </div>
        <div class="card-body">
            <h4 class="card-title"><button class="btn btn-primary">Editer</button></h4>
            <p class="card-text">Nos Genisses</p>
        </div>
    </div>
    <div class="card shadow">
        <div class="inner">
            <img class="card-img-top img-fluid" src="images/bovins/veaux.png">
        </div>
        <div class="card-body">
            <h4 class="card-title"><button class="btn btn-primary">Editer</button></h4>
            <p class="card-text">Nos veaux</p>
        </div>
        </div>
    </div>

    <h1 class="h1-section mr-auto text-primary my-5" id="lait">Nos produits Laitèrs</h1>
    <div class="card-deck container ">
        <div class="card mb-3 shadow">
        <div class="inner">
            <img class="card-img-top img-fluid" src="images/laits/bouteille0.5L1.jpg">
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-primary">Editer</a>
            <p class="card-text">Bouteille de 0.5L</p>
            <p class="card-text text-info"> Prix: 500fr</p>
        </div>
        </div>
        <div class="card mb-3 shadow">
        <div class="inner">
            <img class="card-img-top img-fluid" src="images/laits/bouteille1L.jpg">
      </div>
      <div class="card-body ">
        <a href="#" class="btn btn-primary">Editer</a>
        <p class="card-text">Bouteille de 1L</p>
        <p class="card-text text-info"> Prix: 1000fr</p>
      </div>
    </div>
    <div class="card mb-3 shadow">
      <div class="inner">
        <img class="card-img-top img-fluid" src="images/laits/bidon5L.jpg">
      </div>
      <div class="card-body">
        <a href="#" class="btn btn-primary">Editer</a>
        <p class="card-text">Bouteille de 5L</p>
        <p class="card-text text-info"> Prix: 5000fr</p>
      </div>
    </div>
    <div class="card mb-3 shadow">
    <div class="inner">
        <img class="card-img-top img-fluid" src="images/laits/bidon20L.jpg">
      </div>
      <div class="card-body">
        <a href="#" class="btn btn-primary">Editer</a>
        <p class="card-text">Bouteille de 20L</p>
        <p class="card-text text-info" > Prix: 20000fr</p>
      </div>
    </div>
  </div>

</section>
@endsection