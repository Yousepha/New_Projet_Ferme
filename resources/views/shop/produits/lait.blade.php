@extends('/layouts.base_shop')

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
                   
                    <form action="{{ route('cart_add_B', ['idB'=>$bouteilles[0]->idBouteille]) }}" method="POST" id="panier_add">
                    @csrf

                    <label for="quantite">Quantité</label>
                    <input class="form-control" name="quantite" oninput="this.value = Math.abs(this.value)" id="quantite" type="number">
                    <span style="color:red">@error('quantite') {{$message}} @enderror</span>
                    </form>
                    <button type="submit" form="panier_add" class="btn btn-cart my-2 btn-block btn-warning"><i class="fa fa-lg fa-shopping-cart"></i> Ajouter au Panier</button>

                </div>
            </div>
        </div>

</main>
@endsection