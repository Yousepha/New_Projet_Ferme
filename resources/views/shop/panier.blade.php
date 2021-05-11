@extends('layouts.client_master')
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
                <tr>
                    <td>
                        <img width="110" class="rounded-circle img-thumbnail" src="lait20L.jpg" alt="">
                        Taureau
                    </td>
                    <td>

                                <input style="display: inline-block" id="qte" class="form-control col-sm-4" type="number" value="1" disabled>


                                <a  class="pl-2" href=""><i class="fas fa-sync"></i> </a>
                    </td>
                    <td>
                        1.000.000 F
                    </td>
                    <td>
                       1.000.000 F
                    </td>
                </tr>
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
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>Total TTC</td>
                    <td>10.000</td>
                </tr> -->
                </tfoot>
            </table>
            <a class="btn btn-block btn-outline-primary" href="">Commander</a>
        </div>
    </section>

</main>
@endsection