<nav class="navbar navbar-expand navbar-dark bg-primary  sticky-top">       
    <div class="navbar-nav w-100">
        <a class="navbar-brand text-color" href="/">Ferme Laitière</a> 
        <a class="nav-item nav-link" href="#">La Qualité notre Priorité</a>        
        @if (Route::has('login'))
        <div class="ml-auto">
            @auth
            <a class="nav-item nav-link" href="{{ route('logout') }}" class="logout_btn" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Se déconnecter</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
            @else
            <a class="nav-item nav-link" href="{{ route('login') }}">Se connecter/S'inscrire</a>
            @endauth
        </div>        
        @endif
    </div>
</nav>