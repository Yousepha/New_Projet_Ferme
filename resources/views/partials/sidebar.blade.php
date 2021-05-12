<!--sidebar start-->
			
<aside>
    <div class="sidebar left ">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ URL::to('/') }}/images/{{ auth()->user()->photo }}" class="rounded-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->full_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>En Ligne</a>
            </div>
        </div>
        <ul class="list-sidebar bg-defoult">
            <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> Espace Bovin </span> <span class="fa fa-chevron-left pull-right"></span> </a>
                <ul class="sub-menu collapse" id="dashboard">
                    <li class="active"><a href="{{ route('bovins') }}">Tous les Bovins</a></li>
                    <li class="active"><a href="{{ route('vaches.index') }}">Vaches</a></li>
                    <li><a href="{{ route('taureaux.index') }}">Taureaux</a></li>
                    <!-- <li><a href="{{ route('veaux.index') }}">Veaux</a></li> -->
                    <li><a href="{{ route('genisses.index') }}">Génisses</a></li>
                    <li><a href="{{ route('races.index') }}">Races</a></li>
                    
                </ul>
            </li>
            <!-- <li> <a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">Comptabilité</span></a> </li> -->
                
            <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active" > <i class="fa fa-money"></i> <span class="nav-label">Dépenses</span> <span class="fa fa-chevron-left pull-right"></span> </a>
                <ul  class="sub-menu collapse" id="products" >
                    <li><a href="{{ route('achatbovins') }}">Achat Bovin</a></li>
                    <li><a href="{{ route('achataliments.index') }}">Achat Aliment</a></li>
                    <li><a href="{{ route('autresdepenses.index') }}">Autre Depenses</a></li>
                    <li><a href="{{ route('types.index') }}">Autre Types de Depenses</a></li>
                </ul>
            </li>
            <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active" ><i class="fa fa-medkit"></i> <span class="nav-label">Santé</span><span class="fa fa-chevron-left pull-right"></span></a>
                <ul  class="sub-menu collapse" id="tables" >
                    <li><a href="{{ route('diagnostics.index') }}">Diagnostic</a></li>
                    <li><a href="{{ route('maladies.index') }}">Maladie</a></li>
                </ul>
            </li>
            <li> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active" ><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><span class="fa fa-chevron-left pull-right"></span></a>
                <ul  class="sub-menu collapse" id="e-commerce" >
                    <li><a href="{{ route('produits') }}">Produits en ligne</a></li>
                    <li><a href="{{ route('paniers') }}">Le Panier</a></li>
                    <!-- <li><a href="{{ route('ajoutProduit') }}"> Ajouter un Product </a></li> -->
                    <!-- <li><a href="{{ route('bouteilles.index') }}">Ajout Bouteilles</a></li> -->
                    <!-- {{--<li><a href="{{ route('ventelaits.index') }}"> Vente Lait </a></li>--}} -->
                    <!-- <li><a href="{{ route('ventebovins.index') }}"> Ajout Bovins </a></li>
                    <li><a href="{{ route('liste_commandes') }}"> Panier Bovin</a> </li>
                    <li><a href="{{ route('liste_commandes_lait') }}"> Panier Lait</a> </li> -->
                </ul>
            </li>
            <li> <a href="{{ route('clients.index') }}"><i class="fa fa-users"></i> <span class="nav-label">Clients</span></a> </li>
            <li> <a href="{{ route('employee.index') }}"><i class="fa fa-user-o"></i> <span class="nav-label">Personnel</span></a> </li>
            <li> <a href="{{ URL::to('10.156.93.175:4200') }}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Statistiques</span> </a></li>
            
        </ul>
    </div>
</aside>
            
<!--sidebar end-->