<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    {{ config('app.name', 'Laravel') }}
    </title>
    <link rel="icon" type="image/png" href="assets/logo2.jpg"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style_accueil.css') }}">
    <!--  -->

</head>

<body>
    <!-- MOBILE NAV -->
    <div class="mb-nav">
        <div class="mb-move-item"></div>
        <div class="mb-nav-item active">
            <a href="#home">
                <i class="bx bxs-home"></i>
            </a>
        </div>
        <div class="mb-nav-item">
            <a href="#about">
                <i class='bx bxs-wink-smile'></i>
            </a>
        </div>
        <div class="mb-nav-item">
            <a href="#food-menu-section">
                <i class='bx bxs-food-menu'></i>
            </a>
        </div>
        <div class="mb-nav-item">
            <a href="#testimonial">
                <i class='bx bxs-comment-detail'></i>
            </a>
        </div>
    </div>
    <!-- END MOBILE NAV -->
    <!-- BACK TO TOP BTN -->
    <a href="#home" class="back-to-top">
        <i class="bx bxs-to-top"></i>
    </a>
    <!-- END BACK TO TOP BTN -->
    <!-- TOP NAVIGATION -->
    <div class="nav">
        <div class="menu-wrap">
            <a href="#home">
                <div class="logo">
                {{ config('app.name', 'Laravel') }}
                </div>
            </a>
            <div class="menu h-xs">
                <a href="#home">
                    <div class="menu-item active">
                        Accueil
                    </div>
                </a>
                <a href="#about">
                    <div class="menu-item">
                        A propos
                    </div>
                </a>
                <a href="#food-menu-section">
                    <div class="menu-item">
                        Menu
                    </div>
                </a>
                <a href="#testimonial">
                    <div class="menu-item">
                        Galerie
                    </div>
                </a>
                <a href="/login">
                    <div class="menu-item">
                        Mon Compte
                    </div>
                </a>
            </div>
            <div class="right-menu">
                <div class="cart-btn">
                    <a href="{{route('cart_index')}}">
                        <i class='bx bx-cart-alt'></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- END TOP NAVIGATION -->
    
    <!-- SECTION HOME -->
    <section id="home" class="fullheight align-items-center bg-img bg-img-fixed"
        style="background-image: url(assets/ban.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-6 col-xs-12">
                    <div class="slogan">
                        <h1 class="left-to-right play-on-scroll">
                        {{ config('app.name', 'Laravel') }}
                        </h1>
                        <p style="color:white" class="left-to-right play-on-scroll delay-2">
                            Le développement du secteur laitier est un outil puissant, durable et équitable pour renforcer la croissance économique, la sécurité alimentaire et réduire la pauvreté, car la production laitière:

                            fournit une source régulière de revenus;
                            fournit des aliments nutritifs;
                            diversifie le risque;
                            améliore l'utilisation des ressources;
                            génère des emplois agricoles et non agricoles;
                            crée des opportunités pour les femmes (par exemple, les revenus issus de la vente du lait);
                            assure la stabilité financière et le statut social (par exemple, épargne, création d'avoirs).
                            
                        </p>
                        <!-- <div class="left-to-right play-on-scroll delay-4">
                            <button>
                                Order now
                            </button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION HOME -->

    <!-- SECION ABOUT -->
    <section class="about fullheight align-items-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-7 h-xs">
                    <img src="assets/seneCows.jpg" alt=""
                        class="fullwidth left-to-right play-on-scroll">
                </div>
                <div class="col-5 col-xs-12 align-items-center">
                    <div class="about-slogan right-to-left play-on-scroll">
                        <h3>
                            <span class="primary-color">Nous</span> vendons <span class="primary-color">des vaches et des produits laitières</span>
                            à des prix <span class="primary-color"> incroyables</span>
                        </h3>
                        <p>
                            Visitez notre ferme et profitez des différents produits en lignes
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECION ABOUT -->

    <!-- FOOD MENU SECTION -->
    <section class="align-items-center bg-img bg-img-fixed" id="food-menu-section"
        style="background-image: url(assets/vache_blancs.jpg);">
        
        @yield('content')

    </section>
    <!-- END FOOD MENU SECTION -->
    
    <!-- TESTIMONIAL SECTION -->
    <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-4 col-xs-12">
                    <div class="review-wrap zoom play-on-scroll delay-2">
                        <div class="review-content">
                            <p>
                                <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, labore nisi non
                                molestias, minus laboriosam nostrum impedit iure facilis odio unde quia ad sunt corrupti
                                dolores ratione voluptatibus quidem explicabo. -->
                            </p>
                            <div class="review-img bg-img"
                                style="background-image: url(assets/bovins/vache1.jpg);">
                            </div>
                        </div>
                        <div class="review-info">
                            <h3>
                                Des Vaches de Races rares très productives
                            </h3>
                            <div class="rating">
                                <!-- <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-xs-12">
                    <div class="zoom play-on-scroll">
                        <div class="review-wrap active">
                            <div class="review-content">
                                <p>
                                    <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, labore nisi non
                                    molestias, minus laboriosam nostrum impedit iure facilis odio unde quia ad sunt
                                    corrupti
                                    dolores ratione voluptatibus quidem explicabo. -->
                                </p>
                                <div class="review-img bg-img"
                                    style="background-image: url(assets/fermier.jpg);">
                                </div>
                            </div>
                            <div class="review-info">
                                <h3>
                                    Nos fermiers qui sont très actifs
                                </h3>
                                <div class="rating">
                                    <!-- <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-xs-12">
                    <div class="review-wrap zoom play-on-scroll delay-4">
                        <div class="review-content">
                            <p>
                                <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, labore nisi non
                                molestias, minus laboriosam nostrum impedit iure facilis odio unde quia ad sunt corrupti
                                dolores ratione voluptatibus quidem explicabo. -->
                            </p>
                            <div class="review-img bg-img"
                                style="background-image: url(assets/bovins/veau1.jpg);">
                            </div>
                        </div>
                        <div class="review-info">
                            <h3>
                                Des veaux qui sont en bon état
                            </h3>
                            <div class="rating">
                                <!-- <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END TESTIMONIAL SECTION -->
    <!-- FOOTER SECTION -->
    <section class="footer bg-img" style="background-image: url(assets/ban1a.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-6 col-xs-12">
                    <h1>
                    {{ config('app.name', 'Laravel') }}
                    </h1>
                    <br>
                    <p>Découvrez la qualité de notre offre de bovins, toutes races : veaux et reproducteurs pour le troupeau allaitant, veaux et femelles repro. pour le troupeau laitier et bovins maigres pour l’atelier d’engraissement</p>
                    <br>
                    <p>Email: admin@mail.com</p>
                    <p>Phone: +221 77 454 67 89</p>
                    <!-- <p>Website: freshfood.com</p> -->
                </div>
                {{--<div class="col-2 col-xs-12">
                    <h1>
                        A propos
                    </h1>
                    <br>
                    <p>
                        <a href="#">
                            Chefs
                        </a>
                    </p>
                    <p>
                        <a href="#">
                            Menu
                        </a>
                    </p>
                    <p>
                        <a href="#">
                            
                        </a>
                    </p>
                    <p>
                        <a href="#">
                            Lorem ipsum
                        </a>
                    </p>
                </div>
                --}}
                <!-- <div class="col-4 col-xs-12">
                    <h1>
                        Subscribe & media
                    </h1>
                    <br>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto aspernatur doloremque rerum nam
                        ullam obcaecati error asperiores temporibus quo eum eaque sed odio vitae accusantium, dolorem
                        nihil molestiae deserunt maxime!</p>
                    <div class="input-group">
                        <input type="text" placeholder="Enter your email">
                        <button>
                            Subscribe
                        </button>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- END FOOTER SECTION -->

    <script src="{{ asset('js/index_accueil.js') }}"></script>
</body>

</html>