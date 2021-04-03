@extends('/layouts.base_shop')
@section('content') 
<main role="main">

    <section class="py-5">
        <div class="container">
                <h1 class="jumbotron-heading"> <span class="badge badge-primary ">Votre panier </span></h1>
            <table class="table table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Qte</th>
                        <th>P.U</th>
                        <th>Total TTC</th>
                    </tr>
                </thead>
                <tbody>
                {{-- dd($content) --}}

                @foreach($content as $produit)
                <tr>
                    <td>
                        <img width="110" class="rounded-circle img-thumbnail" src="{{ asset('images/'.$produit->attributes['photo']) }}" alt="">
                        Vache {{ $produit->name }}
                    </td>
                    <td>
                        <input style="display: inline-block" id="qte" class="form-control col-sm-4" type="number" value="{{ $produit->quantity }}">

                        <a  class="pl-2" href=""><i class="fas fa-sync"></i> </a>
                    </td>
                    <td>
                    {{ number_format($produit->price, 2) }} Fcfa
                    </td>
                    <td>
                    {{ number_format($produit->price * $produit->quantity, 2) }} Fcfa
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <!-- <tr>
                    <td colspan="2"></td>
                    <td>Total HT</td>
                    <td>2500 F</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>TVA (20%)</td>
                    <td>100 F</td>
                </tr> -->
                <tr>
                    <td colspan="2"></td>
                    <td>Total TTC</td>
                    <td>{{ number_format($total_prix_panier) }} Fcfa</td>
                </tr>
                </tfoot>
            </table>
            <a class="btn btn-block btn-outline-primary" href="{{ route('login') }}">Commander</a>
        </div>
    </section>

</main>
@endsection