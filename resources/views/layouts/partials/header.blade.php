<header class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="/">FermeLaitiere</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Commuter la navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <!-- <a class="nav-link" href="#">Lait <span class="sr-only">Lait</span></a> -->
        </li>
        <li class="nav-item active">
          <!-- <a class="nav-link" href="#">Bovins</a> -->
        </li>
      </ul>
      {{--<form action="search" method="get" class="form-inline mx-auto pull-center">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Je cherche...">
          <span class="input-group-append">
            <button type="submit" class="btn btn-warning border-0"><span class="fa fa-search"></span></button>
          </span>
        </div>
      </form>--}}

      <ul class="navbar-nav">
      <a href="{{route('cart_index')}}">
      <li class="fa fa-shopping-cart fa-lg my-2 mx-5" style="color: green;">
          <sup class="badge badge-pill badge-primary"style="color: yellow;" >{{ Cart::getTotalQuantity() }}</sup>
      </li>
      </a>  
       


        <li class="nav-item dropdown lang-dropdown active">

          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="lang-dropdown">

            <span class="fa fa-user fa-lg" style="color: green;"></span>
            <span class="hidden-sm">Mon compte</span>

          </a>

          <div class="dropdown-menu shadow">

            <a href="/login" class="dropdown-item">Se connecter</a>

            <!-- <div class="dropdown-divider"></div>

            <a href="/register" class="dropdown-item">S&#039;inscrire</a> -->

          </div>

        </li>


      </ul>

    </div>
    </div>
    </div>
  </header>
  <section class="py-5 text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Faites vos</span> <br> <span class="badge badge-primary ">Commandes </span></h1>
        

    </div>
</section>