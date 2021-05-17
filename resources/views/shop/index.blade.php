@extends('accueil')
@section('content')
<div class="container">
    <div class="food-menu">
        <h1>
            Les produits <span class="primary-color">Récemment</span> ajoutés
        </h1>
        <p>
            <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque alias aliquam eveniet, iure
            praesentium dicta ex dolorum inventore itaque minus repudiandae, odio provident? Velit architecto
            natus expedita non? Odio, dolorum. -->
        </p>
        <div class="food-category">
            <div class="zoom play-on-scroll">
                <button class="active" data-food-type="all">
                    Tout
                </button>
            </div>
            <div class="zoom play-on-scroll delay-2">
                <button data-food-type="salad">
                    Vaches
                </button>
            </div>
            <div class="zoom play-on-scroll delay-4">
                <button data-food-type="lorem">
                    Genisses
                </button>
            </div>
            <div class="zoom play-on-scroll delay-6">
                <button data-food-type="ipsum">
                    Taureaux
                </button>
            </div>
            <div class="zoom play-on-scroll delay-6">
                <button data-food-type="veaux">
                    Veaux
                </button>
            </div>
            <div class="zoom play-on-scroll delay-6">
                <button data-food-type="velles">
                    Velles
                </button>
            </div>
            <div class="zoom play-on-scroll delay-8">
                <button data-food-type="dolor">
                    Lait
                </button>
            </div>
        </div>

        <div class="food-item-wrap all">
            
            
            @if(isset($taureaux))
            @if(count($taureaux) > 0)
            @foreach($taureaux as  $prod)
            <div class="food-item ipsum-type">
                <div class="item-wrap bottom-up play-on-scroll">
                    <div class="item-img">
                        <div class="img-holder bg-img" style="background-image: url('{{ asset('images/'.$prod->photo)}}')"
                            >
                        </div>
                    </div>
                    <div class="item-info">
                        <div>
                            <h3>
                                Taureau
                            </h3>
                            <span>
                                <strike> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <h6> {{$prod->description}} </h6>
                            </span>
                        </div>
                        <div class="cart-btn">
                            <a href="{{route('voir_produit_taureau', ['idTaureau'=>$prod->idBovin])}}">
                                <i class='bx bx-cart-alt'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <!-- <tr><td>pas encore disponible !</td></tr> -->

            <div class="food-item ipsum-type">
                <div class="item-wrap bottom-up play-on-scroll">
                    <div class="item-img">
                        <!-- {{--<div class="img-holder bg-img"
                        style="background-image: url('{{ asset('images/'.$prod->photo)}}')"></div>--}} -->
                    </div>
                    <div class="item-info">
                        <div>
                            <h3>
                                Taureau Non disponible
                            </h3>
                            <span>
                                {{--<strike> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <h6> {{$prod->description}} </h6>--}}
                            </span>
                        </div>
                        <div class="cart-btn">
                            {{--<a href="{{route('voir_produit_genisse', ['idGenisse'=>$prod->idBovin])}}">
                                <i class='bx bx-cart-alt'></i>
                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>

            @endif
            @endif

            @if(isset($velles))
            @if(count($velles) > 0)
            @foreach($velles as  $prod)
            <div class="food-item velles-type">
                <div class="item-wrap bottom-up play-on-scroll">
                    <div class="item-img">
                        <div class="img-holder bg-img"
                        style="background-image: url('{{ asset('images/'.$prod->photo)}}')"></div>
                    </div>
                    <div class="item-info">
                        <div>
                            <h3>
                                Velle
                            </h3>
                            <span>
                                <strike> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <h6> {{$prod->description}} </h6>
                            </span>
                        </div>
                        <div class="cart-btn">
                            <a href="{{ route('voir_produit_velle', ['idVelle'=>$prod->idBovin]) }}">
                                <i class='bx bx-cart-alt'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <!-- <tr><td>pas encore disponible !</td></tr> -->

            <div class="food-item velles-type">
                <div class="item-wrap bottom-up play-on-scroll">
                    <div class="item-img">
                        <!-- {{--<div class="img-holder bg-img"
                        style="background-image: url('{{ asset('images/'.$prod->photo)}}')"></div>--}} -->
                    </div>
                    <div class="item-info">
                        <div>
                            <h3>
                                Velle Non disponible
                            </h3>
                            <span>
                                {{--<strike> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <h6> {{$prod->description}} </h6>--}}
                            </span>
                        </div>
                        <div class="cart-btn">
                            {{--<a href="{{route('voir_produit_genisse', ['idGenisse'=>$prod->idBovin])}}">
                                <i class='bx bx-cart-alt'></i>
                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>

            @endif
            @endif

            @if(isset($bouteilles))
            @if(count($bouteilles) > 0)
            @foreach($bouteilles as  $prod)
            <div class="food-item dolor-type">
                <div class="item-wrap bottom-up play-on-scroll">
                    <div class="item-img">
                        <div class="img-holder bg-img"
                        style="background-image: url('{{ asset('images/'.$prod->photo)}}')"></div>
                    </div>
                    <div class="item-info">
                        <div>
                            <h3>
                                Lait frais
                            </h3>
                            <span>
                                <strike> {{$prod->prix + 500}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <h4> {{$prod->nombreDispo}} en stock</h4>
                                <h6> {{$prod->description}} </h6>{{-- --}}
                            </span>
                        </div>
                        <div class="cart-btn">
                            <a href="{{route('voir_produit_lait', ['idLait'=>$prod->idBouteille])}}">
                                <i class='bx bx-cart-alt'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <!-- <tr><td>pas encore disponible !</td></tr> -->

            <div class="food-item dolor-type">
                <div class="item-wrap bottom-up play-on-scroll">
                    <div class="item-img">
                        <!-- {{--<div class="img-holder bg-img"
                        style="background-image: url('{{ asset('images/'.$prod->photo)}}')"></div>--}} -->
                    </div>
                    <div class="item-info">
                        <div>
                            <h3>
                                Laits Non disponible
                            </h3>
                            <span>
                                {{--<strike> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <h6> {{$prod->description}} </h6>--}}
                            </span>
                        </div>
                        <div class="cart-btn">
                            {{--<a href="{{route('voir_produit_genisse', ['idGenisse'=>$prod->idBovin])}}">
                                <i class='bx bx-cart-alt'></i>
                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>

            @endif
            @endif


            @if(isset($vaches))
            @if(count($vaches) > 0)
            @foreach($vaches as  $prod)
            <div class="food-item salad-type">
                <div class="item-wrap bottom-up play-on-scroll">
                    <div class="item-img">
                        <div class="img-holder bg-img"
                        style="background-image: url('{{ asset('images/'.$prod->photo)}}')"></div>
                    </div>
                    <div class="item-info">
                        <div>
                            <h3>
                                Vache
                            </h3>
                            <span>
                                <strike> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <h6> {{$prod->description}} </h6>
                            </span>
                        </div>
                        <div class="cart-btn">
                            <a href="{{route('voir_produit_vache', ['idVache'=>$prod->idBovin])}}">
                                <i class='bx bx-cart-alt'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <!-- <tr><td>pas encore disponible !</td></tr> -->

            <div class="food-item salad-type">
                <div class="item-wrap bottom-up play-on-scroll">
                    <div class="item-img">
                        <!-- {{--<div class="img-holder bg-img"
                        style="background-image: url('{{ asset('images/'.$prod->photo)}}')"></div>--}} -->
                    </div>
                    <div class="item-info">
                        <div>
                            <h3>
                                Vache Non disponible
                            </h3>
                            <span>
                                {{--<strike> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <h6> {{$prod->description}} </h6>--}}
                            </span>
                        </div>
                        <div class="cart-btn">
                            {{--<a href="{{route('voir_produit_genisse', ['idGenisse'=>$prod->idBovin])}}">
                                <i class='bx bx-cart-alt'></i>
                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>

            @endif
            @endif

            
            @if(isset($genisses))
            @if(count($genisses) > 0)
            @foreach($genisses as  $prod)
            <div class="food-item lorem-type">
                <div class="item-wrap bottom-up play-on-scroll">
                    <div class="item-img">
                        <div class="img-holder bg-img"
                        style="background-image: url('{{ asset('images/'.$prod->photo)}}')"></div>
                    </div>
                    <div class="item-info">
                        <div>
                            <h3>
                                Genisse
                            </h3>
                            <span>
                                <strike> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <h6> {{$prod->description}} </h6>
                            </span>
                        </div>
                        <div class="cart-btn">
                            <a href="{{route('voir_produit_genisse', ['idGenisse'=>$prod->idBovin])}}">
                                <i class='bx bx-cart-alt'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <!-- <tr><td>pas encore disponible !</td></tr> -->
            
            <div class="food-item lorem-type">
                <div class="item-wrap bottom-up play-on-scroll">
                    <div class="item-img">
                        <!-- {{--<div class="img-holder bg-img"
                        style="background-image: url('{{ asset('images/'.$prod->photo)}}')"></div>--}} -->
                    </div>
                    <div class="item-info">
                        <div>
                            <h3>
                                Genisse Non disponible
                            </h3>
                            <span>
                                {{--<strike> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <h6> {{$prod->description}} </h6>--}}
                            </span>
                        </div>
                        <div class="cart-btn">
                            {{--<a href="{{route('voir_produit_genisse', ['idGenisse'=>$prod->idBovin])}}">
                                <i class='bx bx-cart-alt'></i>
                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>

            @endif
            @endif

            @if(isset($veaux))
            @if(count($veaux) > 0)
            @foreach($veaux as  $prod)
            <div class="food-item veaux-type">
                <div class="item-wrap bottom-up play-on-scroll">
                    <div class="item-img">
                        <div class="img-holder bg-img"
                        style="background-image: url('{{ asset('images/'.$prod->photo)}}')"></div>
                    </div>
                    <div class="item-info">
                        <div>
                            <h3>
                                Veau
                            </h3>
                            <span>
                                <strike> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <h6> {{$prod->description}} </h6>
                            </span>
                        </div>
                        <div class="cart-btn">
                            <a href="{{route('voir_produit_veau', ['idVeau'=>$prod->idBovin])}}">
                                <i class='bx bx-cart-alt'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <!-- <tr><td>pas encore disponible !</td></tr> -->
                    
            <div class="food-item veaux-type">
                <div class="item-wrap bottom-up play-on-scroll">
                    <div class="item-img">
                        <!-- {{--<div class="img-holder bg-img"
                        style="background-image: url('{{ asset('images/'.$prod->photo)}}')"></div>--}} -->
                    </div>
                    <div class="item-info">
                        <div>
                            <h3>
                                Veaux Non disponible
                            </h3>
                            <span>
                                {{--<strike> {{$prod->prix + 10000}}  Fcfa</strike>
                                <h4> {{$prod->prix}} Fcfa</h4>
                                <h6> {{$prod->description}} </h6>--}}
                            </span>
                        </div>
                        <div class="cart-btn">
                            {{--<a href="{{route('voir_produit_genisse', ['idGenisse'=>$prod->idBovin])}}">
                                <i class='bx bx-cart-alt'></i>
                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>

            @endif
            @endif

            
        </div>
    </div>
</div>
@endsection