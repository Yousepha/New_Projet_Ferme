@extends('/layouts.base_shop')
@section('content') 
<main role="main">

    @if($message = Session::get('error'))
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert" type="button">x</button>
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif

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
                        <input style="display: inline-block" name="qty" id="qte" class="form-control col-sm-4" type="number" oninput="this.value = Math.abs(this.value)" value="{{ $produit->quantity }}">{{--disabled--}}
                        @csrf
                            <button type="submit" class="btn py-1 pl-3 pr-3 btn-circle btn-outline-success fa fa-refresh"> </button>
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
            <a class="btn btn-block btn-outline-primary" href="{{ route('login') }}">Commander</a>
        </div>
    </section>

</main>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Confirmez-vous la suppression ?',
        text: 'Cet enregistrement et ses détails seront définitivement supprimés!',
        icon: 'warning',
        showCancelButton: true,
        buttons: ["Annuler", "Oui!"],

    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>@endsection