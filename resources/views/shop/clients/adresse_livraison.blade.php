@extends('layouts.client_master')
@section('content')
<main role="main">

    <div class="container">
        <div class="py-5 jumbotron bg-dark text-white text-center">
            <i class="fa fa-4x fa-truck"></i>


            <h2>Votre adresse de livraison</h2>
            <label for="">Les frais de Livraison sont fixés pour chaque Kilomètre à 100 Fcfa</label>

        </div>

        <div class="row">

            <div class="col-md-12 order-md-1">
                <form class="needs-validation" action="{{ route('adresse.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="address">Votre adresse <span class="text-danger">*</span></label>
                            <input type="text" name="adresse" class="form-control" id="address">
                            <span style="color:red">@error('adresse') {{$message}} @enderror</span>

                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="ville">Votre ville <span class="text-danger">*</span></label>
                            <select name="frais" class="custom-select d-block w-100" id="country" required>
                                <option value="164">Dakar</option>
                                <option value="0">Diourbel</option>
                                <option value="47">Fatick</option>
                                <option value="124">Kaffrine</option>
                                <option value="64">Kaolack</option>
                                <option value="571">Kédougou</option>
                                <option value="563">Kolda</option>
                                <option value="151">Louga</option>
                                <option value="396">Matam</option>
                                <option value="258">Saint-Louis</option>
                                <option value="261">Sédhiou</option>
                                <option value="338">Tambacounda</option>
                                <option value="78">Thiès</option>
                                <option value="323">Ziguinchior</option>
                            </select>
                        </div>

                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-outline-dark btn-lg btn-block" type="submit">Procéder au paiement</button>
                </form>
            </div>
        </div>

</main>

@endsection
