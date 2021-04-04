@extends('/layouts.client_master')

@section('content')
<main role="main">


        <div class="container">

            <div class="row justify-content-between">
                <div class="col-6">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('images/'.$bouteilles[0]->photo)}}" alt="Card image cap">

                    </div>
                </div>
                <div class="col-6">

                    <h1 class="jumbotron-heading">Lait frais à vendre</h1>
                    <h5>{{$bouteilles[0]->prix}} Fcfa</h5>
                    <h4> {{$bouteilles[0]->nombreDispo}} <strong> en stock</strong></h4>
                    <p class="lead text-muted">
                    {{$bouteilles[0]->description}}
                    </p>
                    <hr>
                   
                    <form action="{{ route('cart_add_B_client', ['idB'=>$bouteilles[0]->idBouteille]) }}" method="POST" id="panier_add">
                    @csrf

                    <label for="qty">Quantité</label>
                    <input class="form-control" name="qty" id="qty" type="number" value="1">
                    </form>
                    <button type="submit" form="panier_add" class="btn btn-cart my-2 btn-block btn-warning"><i class="fa fa-lg fa-shopping-cart"></i> Ajouter au Panier</button>

                </div>
            </div>
        </div>

</main>
@endsection