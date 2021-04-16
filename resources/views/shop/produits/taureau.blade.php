@extends('/layouts.base_shop')

@section('content')
<main role="main">


        <div class="container">


            <div class="row justify-content-between">
                <div class="col-6">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('images/'.$taureaux[0]->photo)}}" alt="Card image cap">

                    </div>
                </div>
                <div class="col-6">

                    <h1 class="jumbotron-heading">Taureau à vendre</h1>
                    <h5>{{$taureaux[0]->prix}} Fcfa</h5>
                    <p class="lead text-muted">
                    {{$taureaux[0]->description}}
                    </p>
                    <hr>
                   
                    <form action="{{ route('cart_add_T', ['idT'=>$taureaux[0]->idBovin]) }}" method="POST" id="panier_add">
                    @csrf

                    <label for="qty">Quantité</label>
                    <input class="form-control" name="qty" id="qty" type="number" value="1" >
                    <span style="color:red">@error('qty') {{$message}} @enderror</span>
                    </form>
                    <button type="submit" form="panier_add" class="btn btn-cart my-2 btn-block btn-warning"><i class="fa fa-lg fa-shopping-cart"></i> Ajouter au Panier</button>


                </div>
            </div>
        </div>

</main>
@endsection