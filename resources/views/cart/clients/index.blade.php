@extends('/layouts.client_master')
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
                        <th>Opération</th>
                    </tr>
                </thead>
                <tbody>
                {{-- dd($content) --}}

                @foreach($content as $produit)
                <tr>
                    <td>
                        <img width="110" class="rounded-circle img-thumbnail" src="{{ asset('images/'.$produit->attributes['photo']) }}" alt="">
                        {{ $produit->name }}
                    </td>
                    <td>
                        <form  action="{{ url('/cart/update')}}/{{ $produit->id }}" method="post">
                        <input style="display: inline-block" oninput="this.value = Math.abs(this.value)" name="qty" id="qte" class="form-control col-sm-4" type="number" value="{{ $produit->quantity }}">{{--disabled--}}
                        @csrf
                            <button type="submit" class="btn py-2 pl-3 pr-3 btn-circle btn-outline-success fas fa-refresh"> </button>
                        </form>
                    </td>
                    <td>
                    {{ number_format($produit->price) }} Fcfa
                    </td>
                    <td>
                    {{ number_format($produit->price * $produit->quantity) }} Fcfa
                    </td>
                    <td>       
                        <a href="{{ url('/cart/remove')}}/{{ $produit->id }}" class="btn btn-danger delete-confirm"><span class="fa fa-trash"> Retirer</span></a>
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
            <a class="btn btn-block btn-outline-primary" href="{{ route('ma_commande') }}">Commander</a>
        </div>
    </section>

</main>
@endsection