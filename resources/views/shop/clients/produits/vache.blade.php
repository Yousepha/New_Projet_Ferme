@extends('/layouts.client_master')

@section('content')
<main role="main">


        <div class="container">

            <div class="row justify-content-between">
                <div class="col-6">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('images/'.$vaches[0]->photo)}}" alt="Card image cap">

                    </div>
                </div>
                <div class="col-6">

                    <h1 class="jumbotron-heading">Vache à vendre</h1>
                    <h5>{{$vaches[0]->prix}} Fcfa</h5>
                    <p class="lead text-muted">
                    {{$vaches[0]->description}}
                    </p>
                    <hr>
                   
                    <form action="{{ route('cart_add_V_client', ['idV'=>$vaches[0]->idBovin]) }}" method="POST" id="panier_add">
                    @csrf

                    <input class="form-control" oninput="this.value = Math.abs(this.value)" name="qty" id="qty" value="1" type="hidden">
                    </form>
                    <button type="submit" form="panier_add" class="btn btn-cart my-2 btn-block btn-warning"><i class="fa fa-lg fa-shopping-cart"></i> Ajouter au Panier</button>

                   
                    {{--<p>
                        <a href="{{route('panierVisiteur')}}" class="btn btn-cart my-2 btn-block btn-warning"><i class="fa fa-lg fa-shopping-cart"></i> Ajouter au Panier</a>
                    </p>--}}

                </div>
            </div>
        </div>

</main>
@endsection