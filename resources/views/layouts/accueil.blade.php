<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>

<body>
  <header class="navbar navbar-expand-md navbar-dark bg-info sticky-top ">
    <a class="navbar-brand" href="#">FermeLaitiere</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Commuter la navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#lait">Lait <span class="sr-only">Lait</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#bovin">Bovins</a>
        </li>
      </ul>
      <form action="search" method="get" class="form-inline mx-auto pull-center">
        <div class="input-group input-group-lg">
          <input type="text" name="search" style="width:400px; height:50px;" class="form-control" placeholder="Je cherche...">
          <span class="input-group-append">
            <button type="submit" class="btn btn-warning border-0"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>

      <ul class="navbar-nav">
        <li>
        <a href="#" >

          
            <img style="margin:10px;" src="images/icones/cart.svg" alt="shopping">
          
        </a>
        </li>


        <li class="nav-item dropdown lang-dropdown active">

          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="lang-dropdown">
            
            <img src="images/icones/user.svg" alt="user">
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

    
<main role="main">
    <section id="catching-section" style="background: #264653  url(images/bannier/ban4.jpg)  ; background-size: cover; background-attachment: fixed; background-position: center;" class="d-flex align-items-center">
      <div class="container">
        <div class="py-5">
          <div class="row">

            <div class="col-md-6">

              <h3 class="slogan mb-3 text-light text-lg">Visitez notre ferme et profitez des différents produits offerts</h3>

              <div class="text-white">

                <p class="mb-4 text-warning" style="font-size: 17px;">Le développement du secteur laitier est un outil puissant, durable et équitable pour renforcer la croissance économique, la sécurité alimentaire et réduire la pauvreté, car la production laitière:

                  fournit une source régulière de revenus;
                  fournit des aliments nutritifs;
                  diversifie le risque;
                  améliore l'utilisation des ressources;
                  génère des emplois agricoles et non agricoles;
                  crée des opportunités pour les femmes (par exemple, les revenus issus de la vente du lait);
                  assure la stabilité financière et le statut social (par exemple, épargne, création d'avoirs).</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section>
      <h1 class="h1-section mr-auto text-primary py-4">Nos animaux</h1>
      <div>
        <div class="container-fluid p-4">
          <div class="row">
            <div class="col-md-3">
              <div class="card mb-4 img-fluid box-shadow">
                <img src="images/bovin/vachePetit.jpg" class="card-img-top img-fluid" alt="Responsive image">
                <div class="card-body">
                  <p class="card-text">nom: Nana <br>description: race Hollande </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="price">2.500.000 F</span>
                    <a href="{{route('achatVisiteur')}}" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img src="images/bovin/VacheS1.jpg" class="card-img-top img-fluid" alt="Responsive image">
                <div class="card-body">
                  <p class="card-text">nom: Nini <br>description: race Hollande </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="price">700.000 F</span>
                    <a href="{{route('achatVisiteur')}}" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img src="images/bovin/taureauS2.jpg" class="card-img-top img-fluid" alt="Responsive image">
                <div class="card-body">
                  <p class="card-text">nom: Minet <br>description: race Italiane </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="price">1.000.000 F</span>
                    <a href="{{route('achatVisiteur')}}" class="btn btn-sm btn-outline-primary btn-warning"><span class="fa fa-eye"></span></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img src="images/bovin/unVeau.jpg" class="card-img-top img-fluid" alt="Responsive image">
                <div class="card-body">
                  <p class="card-text">nom: Ana <br>description: race Italiane-sud </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="price">1.050.000 F</span>
                    <a href="{{route('achatVisiteur')}}" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img src="images/bovin/taureauS3.jpg" class="card-img-top img-fluid" alt="Responsive image">
                <div class="card-body">
                  <p class="card-text">nom: Lahna <br>description: race Pakistan </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="price">1.250.000 F</span>
                    <a href="{{route('achatVisiteur')}}" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img src="images/bovin/genisses.jpg" class="card-img-top img-fluid" alt="Responsive image">
                <div class="card-body">
                  <p class="card-text">nom: kahona <br>description: race Indou </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="price">1.700.000 F</span>
                    <a href="{{route('achatVisiteur')}}" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img src="images/bovin/velleS.jpg" class="card-img-top img-fluid" alt="Responsive image">
                <div class="card-body">
                  <p class="card-text">nom: kahona <br>description: race Indou </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="price">1.700.000 F</span>
                    <a href="{{route('achatVisiteur')}}" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img src="images/bovin/coupleBovin.jpg" class="card-img-top img-fluid" alt="Responsive image">
                <div class="card-body">
                  <p class="card-text">nom: kahona <br>description: race Indou </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="price">1.700.000 F</span>
                    <a href="{{route('achatVisiteur')}}" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          </div>
        </div>
        <div class="btn-group mx-5">
          <button type="button" class="btn btn-outline-primary dropdown-toggle" id="deroulant" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">Voir plus de bovins</button>
          <div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="deroulant">
            <a class="dropdown-item" href="taureau">Taureaux</a>
            <a class="dropdown-item" href="vache">Vaches</a>
            <a class="dropdown-item" href="genisse">Genisses</a>
            <a class="dropdown-item" href="veau">Veaux</a>
            <a class="dropdown-item" href="velle">Velles</a>

          </div>
        </div>
    </section>


    <section>
      <h1 class="h1-section mr-auto text-primary my-2">Nos produits Laitèrs</h1>
      <div class="py-1">
        <div class="container-fluid p-4">
          <div class="row">
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
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
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
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
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
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
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
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
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
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
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img src="images/lait/seau10L.jpg" class="card-img-top img-fluid" alt="Responsive image">
                <div class="card-body">
                  <p class="card-text">Lait pur<br>date expiration </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="price">3000 F</span>
                    <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img src="images/lait/paquet.jpg" class="card-img-top img-fluid" alt="Responsive image">
                <div class="card-body">
                  <p class="card-text">Lait pur<br>date expiration </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="price">250 F</span>
                    <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img src="images/lait/sachet.jpg" class="card-img-top img-fluid" alt="Responsive image">
                <div class="card-body">
                  <p class="card-text">Lait pur<br>date expiration </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="price">100 F</span>
                    <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          </div>
        </div>
      </div>
    </section>

  </main>



  <footer>
    <div class="blockquote-footer">Bien gérer nos fermes pour augmenter la production laitiére et combler la demande</div>
    <div class="w-100"></div>
    <p class="col text-justify">
      l'elevage notre vision
    </p>

    <section class="row justify-content-center">
      <div class="col-md-8">
        <p class="lead font-weight-bold">Si vous voulez me laisser un message</p>
        <form method="POST" action="https://mail.google.com/mail/u/0/?tab=wm&ogbl#inbox">
          <p class="lead">Comment avez-vous connue notre ferme ?</p>
          <div class="custom-control custom-radio custom-control-inline">
            <input id="radio1" name="origine" type="radio" class="custom-control-input" value="ami" checked>
            <label class="custom-control-label" for="radio1">Par un ami</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input id="radio2" name="origine" type="radio" class="custom-control-input" value="web">
            <label class="custom-control-label" for="radio2">Sur le web</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input id="radio3" name="origine" type="radio" class="custom-control-input" value="hasard">
            <label class="custom-control-label" for="radio3">Par hasard</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input id="radio4" name="origine" type="radio" class="custom-control-input" value="autre">
            <label class="custom-control-label" for="radio4">Autre...</label>
          </div>
          <fieldset class="form-group">
            <label for="textarea">Votre message :</label>
            <textarea id="textarea" class="form-control" rows="4"></textarea>
            <small class="form-text text-muted">Vous pouvez agrandir la fenêtre</small>
          </fieldset>
          <button class="btn btn-primary" type="submit"><span class="fa fa-send-o" style="color:#4f4;"></span> Envoyer</button>
        </form>
        <div class="container">


          <p class="float-right">
            <a href="#" class="btn btn-outline-primary">Revenir en haut</a>
          </p>
          <br><br>
          <p class="text-center"> &copy; Copyright {{date('Y')}}</p>
        </div>
      </div>
    </section>
  </footer>

</body>

</html>