<!DOCTYPE html>
<html lang="en">

<head>
    <title>fermeLaitiere</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="http://127.0.0.1:8000/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/app.css') }}" rel="stylesheet">
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
                    <a class="nav-link" href="#">Lait <span class="sr-only">Lait</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Bovins</a>
                </li>
            </ul>
            <form action="search" method="get" class="form-inline mx-auto pull-center">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Je cherche...">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-warning border-0"><span class="fa fa-search"></span></button>
                    </span>
                </div>
            </form>

            <ul class="navbar-nav">
                <li>
                    <span class="fa fa-shopping-cart fa-lg my-3 mx-5 " style="color: yellow;"></span>
                </li>


                <li class="nav-item dropdown lang-dropdown active">

                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="lang-dropdown">

                        <span class="fa fa-user fa-lg" style="color: yellow;"></span>
                        <span class="hidden-sm">Mon compte</span>

                    </a>

                    <div class="dropdown-menu shadow">

                        <a href="http://localhost/ferme/login" class="dropdown-item">Se connecter</a>

                        <div class="dropdown-divider"></div>

                        <a href="http://localhost/ferme/register" class="dropdown-item">S&#039;inscrire</a>

                    </div>

                </li>


            </ul>

        </div>
        </div>
        </div>
    </header>

    <section id="catching-section" style="background: #264653  url(images/bovin/troupeau7.jpg)  ; background-size: cover; background-attachment: fixed; background-position: center;" class="d-flex align-items-center">

        <div class="container">
            <div class="py-5">
                <div class="row">

                    <div class="col-md-6">

                        <h3 class="slogan mb-3 text-dark text-lg">Visitez notre ferme et profitez des différents produits offerts</h3>

                        <div class="text-white">

                            <p class="mb-4 text-warning" style="font-size: 17px;">Le développement du secteur laitier est un outil puissant, durable et équitable pour renforcer la croissance économique, la sécurité alimentaire et réduire la pauvreté, car la production laitière:

                                fournit une source régulière de revenus;
                                fournit des aliments nutritifs;
                                diversifie le risque;
                                améliore l'utilisation des ressources;
                                génère des emplois agricoles et non agricoles;
                                crée des opportunités pour les femmes (par exemple, les revenus issus de la vente du lait);
                                assure la stabilité financière et le statut social (par exemple, épargne, création d'avoirs).</p>
                            <a href="#" class="btn btn-outline-warning mr-0 mr-sm-3"><i class="fa fa-play-circle"></i>Espace bovin </a>
                            <a href="#" class="btn btn-outline-warning"><i class="fa fa-rss"></i> Prouits laitiéres</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-1 linear-g-w m-5">

        <h1 class="h1-section mr-auto text-primary">Nos animeaux</h1>
        <div class="card-deck container m-3">
            <div class="card inner ">
                <img class="card-img-top img-fluid" src="images/bovin/taureau1.jpg">
                <div class="card-body">
                    <button class="btn btn-primary">acheter</button>
                    <p class="card-text">900.000 F</p>
                </div>
            </div>
            <div class="card inner ">
                <img class="card-img-top  img-fluid" src="images/bovin/uneVache.jpg">
                <div class="card-body">
                    <button class="btn btn-primary">acheter</button>
                    <p class="card-text">750.000 F</p>
                </div>
            </div>
            <div class="card inner ">
                <img class="card-img-top img-fluid" src="images/bovin/uneGenisse.jpg">
                <div class="card-body">
                    <button class="btn btn-primary">acheter</button>
                    <p class="card-text">450.000 F</p>
                </div>
            </div>
            <div class="card inner ">
                <img class="card-img-top img-fluid" src="images/bovin/unVeau.jpg">
                <div class="card-body">
                    <button class="btn btn-primary">acheter</button>
                    <p class="card-text">275.000 F</p>
                </div>
            </div>
            <div class="card inner ">
                <img class="card-img-top img-fluid" src="images/bovin/uneVelle.jpg">
                <div class="card-body">
                    <button class="btn btn-primary">acheter</button>
                    <p class="card-text">270.000 F</p>
                </div>
            </div>
        </div>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-outline-primary dropdown-toggle" id="deroulant" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">Voir plus de bovins</button>
            <div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="deroulant">
                <a class="dropdown-item" href="taureau">Taureaux</a>
                <a class="dropdown-item" href="vache">Vaches</a>
                <a class="dropdown-item" href="genisse">Genisses</a>
                <a class="dropdown-item" href="veau">Veaux</a>
                <a class="dropdown-item" href="velle">Velles</a>

            </div>
        </div>

        <h1 class="h1-section mr-auto text-primary my-5">Nos produits Laitèrs</h1>
        <div class="card-deck container">
            <div class="card border-dark mb-3 inner">
                <div class="inner">
                    <img class="card-img-top img-fluid" src="images/lait/lait0.5l.jpg">
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-primary">acheter</a>
                    <p class="card-text">Bouteille de 0.5L</p>
                </div>
            </div>
            <div class="card border-dark mb-3 inner">
                <div class="inner">
                    <img class="card-img-top img-fluid" src="images/lait/lait1l.jpg">
                </div>
                <div class="card-body ">
                    <a href="#" class="btn btn-primary">acheter</a>
                    <p class="card-text">Bouteille de 1L</p>
                </div>
            </div>
            <div class="card border-dark mb-3">
                <div class="inner">
                    <img class="card-img-top img-fluid" src="images/lait/lait5l.jpg">
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-primary">acheter</a>
                    <p class="card-text">Bouteille de 5L</p>
                </div>
            </div>
            <div class="card border-dark mb-3">
                <div class="inner">
                    <img class="card-img-top img-fluid" src="images/lait/lait20l.jpg">
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-primary">acheter</a>
                    <p class="card-text">Bouteille de 20L</p>
                </div>
            </div>
        </div>

    </section>
    <footer class="blockquote-footer">Bien gérer nos fermes pour augmenter la production laitiére et combler la demande</footer>
    </blockquote>
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
            <br>
            <p> &copy; Copyright 2021</p>
        </div>
    </section>
    </div>
</body>

</html>
</body>

</html>