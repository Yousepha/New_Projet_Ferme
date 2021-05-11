@extends('layouts.master')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Ajouter un produit</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary">Lister les produits</button>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        Nouveau
                    </button>
                </div>
            </div>
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom du produit</label>
                        <input type="email" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prix_ht">PRIX </label>
                        <input type="password" class="form-control" id="prix_ht" name="prix_ht">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" id="description"></textarea>
                    </div>
                </div>
               <div class="form-row">
                   <div class="form-group">
                       <label for="photo_principale">Photo du produit</label>
                       <input type="file" class="form-control-file" id="photo_principale" name="photo_principale">
                   </div>
               </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="category_id">Catégorie</label>
                        <select class="form-control form-control-lg" id="category_id" name="category_id">
                            <option>Catégorie nom</option>
                            <option>Catégorie nom</option>
                            <option>Catégorie nom</option>
                        </select>
                    </div>
                    <!-- <div class="form-group col-md-6">
                        <label for="tags">Tags</label>
                        <select multiple class="form-control" id="tags" name="tags">
                            <option>TShirt Nom</option>
                            <option>TShirt Nom</option>
                            <option>TShirt Nom</option>
                            <option>TShirt Nom</option>
                            <option>TShirt Nom</option>
                        </select>
                    </div> -->
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="produits_recommandes">Produits recommandés</label>
                        <select multiple class="form-control" name="produits_recommandes" id="produits_recommandes">
                            <option>Bouteille 20l</option>
                            <option>Bouteille 10l</option>
                            <option>Bouteille 15l</option>
                            <option>Bouteille 40l</option>
                            <option>Bouteille 10l</option>
                        </select>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
    </main>
@endsection('content')