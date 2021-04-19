<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style_fermier.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>    <!-- Jquery and FontAwesone -->
</head>
<body>
    <div class="menu-wrapper">
        <div class="sidebar-header">
            <div class="sidebar">

                <div><img style="border-radius:100%" src="{{ asset('logo/logo.jpg') }}" alt="logo"></div>

                <ul>
                    <li class="selected"><i class="fa fa-home"></i><a style="text-decoration:none" href="{{ route('fermier.home') }}">Accueil</a></li>
                    <li><i class="fa fa-flask"></i><a style="text-decoration:none" href="{{ route('traites.index') }}">Traite du jour</a></li>
                    <li><i class="fa fa-plus-circle"></i><a style="text-decoration:none" href="{{ route('veaux.index') }}">Ajout veaux</a></li>
                    <li><i class="fa fa-plus-circle"></i><a style="text-decoration:none" href="{{ route('velles.index') }}">Ajout velle</a></li>
                    <!-- <li><i class="fa fa-filter"></i><a style="text-decoration:none" href="{{ route('bouteilles.index') }}">Les bouteilles de lait</a></li> -->
                    <li><i class="fa fa-cogs"></i><a style="text-decoration:none" href="{{ route('pesages.index') }}">Pesage</a></li>
                    <li><i class="fa fa-medkit"></i><a style="text-decoration:none" href="{{ route('diagnosticfermiers.index') }}">Sante</a></li>
                    <li><i class="fa fa-user"></i><a style="text-decoration:none" href="{{ route('profile') }}">Mon compte</a></li>
                    <li><i class="fa fa-cutlery"></i><a style="text-decoration:none" href="{{ route('alimentationjour.index') }}">Alimentation du jour</a></li>
                    <li><a style="text-decoration:none" href="{{ route('logout') }}"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                        <span class="text">Deconnexion</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            <!-- @csrf -->
                            {{ CSRF_field() }}
                        </form>
                    </li>                
                </ul>

                <span class="cross-icon"><i class="fa fa-times"></i></span>

            </div>

            <div class="backdrop"></div>

            <div class="content">
                <header>
                    <div id="mobile" class="menu-button">
                        <i class="fa fa-bars"></i>
                    </div>
                    
                    <div id="desktop" class="menu-button">
                        <i class="fa fa-bars"></i>
                    </div>
                    <h1>{{ config('app.name', 'Laravel') }}</h1>
                    
                    <img src="{{ asset('images/fermier.jpg') }}" alt="">
                </header>
                <div class="content-data">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $('#desktop').click(function(){
        $('li a').toggleClass('hideMenuList');
        $('.sidebar').toggleClass('changeWidth');
        })

        $('#mobile').click(function(){
            $('.sidebar').toggleClass('showMenu');
            $('.backdrop').toggleClass('showBackdrop');
        })

        $('.cross-icon').click(function(){
            $('.sidebar').toggleClass('showMenu');
            $('.backdrop').removeClass('showBackdrop');
        })

        $('.backdrop').click(function(){
            $('.sidebar').removeClass('showMenu');
            $('.backdrop').removeClass('showBackdrop');
        })

        $('li').click(function(){
            $('li').removeClass();
            $(this).addClass('selected');
            $('.sidebar').removeClass('showMenu');
            $('.backdrop').removeClass('showBackdrop');
        })
    </script>
</body>
</html>