@extends('/layouts.base_shop')

@section('content')
<main role="main">


        <div class="container">


            <div class="row justify-content-between">
                <div class="col-6">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('images/'.$velles[0]->photo)}}" alt="Card image cap">

                    </div>
                </div>
                <div class="col-6">

                    <h1 class="jumbotron-heading">Velle à vendre</h1>
                    <h5>{{$velles[0]->prixBovin}} Fcfa</h5>
                    <p class="lead text-muted">
                    {{$velles[0]->description}}
                    </p>
                    <hr>
                   
                    <p>
                        <a href="{{route('panierVisiteur')}}" class="btn btn-cart my-2 btn-block btn-warning"><i class="fa fa-lg fa-shopping-cart"></i> Ajouter au Panier</a>
                    </p>

                </div>
            </div>
        </div>

</main>
@endsection