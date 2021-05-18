@extends('layouts.master')
    
@section('content')
<link rel="stylesheet" href="{{ asset('css/home_dashboard_style.css') }}">

  
<div class="container-fluid ">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
                <div class="col-xl-3 col-sm-6 p-2">
                    <div class="card card-common">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <i class="fa fa-shopping-cart fa-3x text-info"></i>
                                <div class="text-center text-dark">
                                    <h5>Chiffre d'affaire</h5>
                                    <h3>{{ $som_ventes }}F</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-dark">
                            <i class="fa fa-spinner fa-pulse text-info mr-3"></i>
                            <span>Mise à jour</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 p-2">
                    <div class="card card-common">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <i class="fa fa-money fa-3x text-success"></i>
                                <div class="text-right text-dark">
                                    <h5>Dépenses</h5>
                                    <h3>{{ $som_depenses }}F</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-dark">
                            <i class="fa fa-spinner fa-pulse text-success mr-3"></i>
                            <span>Mise à jour</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 p-2">
                    <div class="card card-common">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <i class="fa fa-users fa-3x text-warning"></i>
                                <div class="text-right text-dark">
                                    <h5>Clients</h5>
                                    <h3>{{ $users }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-dark">
                            <i class="fa fa-spinner fa-pulse text-warning mr-3"></i>
                            <span>Mise à jour</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 p-2">
                    <div class="card card-common">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <i class="fa fa-bar-chart-o fa-3x text-danger"></i>
                                <div class="text-right text-dark">
                                    <h5>Bénéfices</h5>
                                    <h3>{{ $revenu }}F</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-dark">
                            <i class="fa fa-spinner fa-pulse text-danger mr-3"></i>
                            <span>Mise à jour</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
     
</section>

      <!---End of Cards-->
      <!--table-->
<section>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-xl-12 col-lg-12 col-md-12 ml-auto">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-12 mb-4 mb-xl-0">
                        <h3 class="text-dark text-center mb-3">
                            Salaire du personnel
                        </h3> 
                        <table class="table table-striped bg-light text-center">
                            <thead>
                                <tr class="text-dark">
                                    <th>#</th>
                                    <th>Prénom & Nom</th>
                                    <th>Salaire</th>
                                    <th>Photo</th>
                                    <th>Contact</th>
                                </tr>
                            </thead>
                            @foreach($fermiers as $fermier)

                            <tbody>
                                <tr>
                                    <th>{{++$i}}</th>
                                    <td>{{ $fermier->prenom}} {{ $fermier->nom }}</td>
                                    <td>{{ $fermier->salaire }}F</td>
                                    <td><img src="{{ URL::to('/') }}/images/{{ $fermier->photo }}" class="rounded-circle" width="60" height="50" /></td>
                                    <td>{{ $fermier->telephone }}</td>
                                    <!-- <td>10-09-2019</td> -->
                                    <!-- <td><button type="button" class="btn btn-danger btn-sm">Un Message</button></td> -->
                                </tr>
                            </tbody>
                            @endforeach         
                        </table>
                        <!---Pagination-->
                        <div class="pagination-block">
                            
                            {{  $fermiers->appends(request()->input())->links('layouts.paginationlinks') }}
                        </div>
                        <!---End of Pagination-->
                    </div>
                    <div class="col-xl-6 col-12">
                        <h3 class="text-dark text-center mb-3">Etat des Bovins</h3>
                        <table class="table table-color  table-hover">
                            <thead>
                                <tr class="text-dark">
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Code Bovin</th>
                                    <th>Photo</th>
                                    <th>Etat</th>

                                </tr>
                            </thead> 
                            @foreach($bovins as $bovin)
                            <tbody>
                                <tr>
                                    <th>{{++$j}}</th>
                                    <td>{{ $bovin->nom }}</td>
                                    <td>{{ $bovin->codeBovin }}</td>
                                    <td><img src="{{ URL::to('/') }}/images/{{ $bovin->photo }}" class="rounded-circle" width="60" height="50" /></td>
                                    @if($bovin->etatDeSante != "Malade")
                                        <td><span class="badge badge-success w-75 py-2">{{ $bovin->etatDeSante }}</span></td>
                                    @else
                                        <td><span class="badge badge-danger w-75 py-2">{{ $bovin->etatDeSante }}</span></td>
                                    @endif
                                </tr>  
                            </tbody>
                            @endforeach         
                        </table>
                        <!---Pagination-->
                        <div class="pagination-block">
                            {{  $fermiers->appends(request()->input())->links('layouts.paginationlinks') }}
                        </div>
                        <!---End of Pagination-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--End of table-->
<!---Quick post-->
{{--<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 ml-auto">
                <div class="row">
                    <div class="col-xl-6 col-12">
                        <h4 class="text-dark p-3 mb-3">Taches.</h4>
                        <div class="container-fluid bg-1">
                            <div class="row py-3 mb-4 task-border align-items-center">
                                <div class="col-1">
                                    <input type="checkbox" checked>
                                </div>
                                <div class="col-sm-9 col-8">
                                    Lorem ipsum dolor sit amet, consectetur 
                                    adipisicing elit.
                                </div>
                                <div class="col-1">
                                    <a href="#"data-toggle="tooltip" title="Edit" data-placement="top">
                                        <i class="fa fa-edit fa-lg text-success mr-2"></i>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="#"data-toggle="tooltip" title="Delete" data-placement="top">
                                        <i class="fa fa-trash-o fa-lg text-danger"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid bg-2">
                            <div class="row py-3 mb-4 task-border align-items-center">
                                <div class="col-1">
                                    <input type="checkbox" checked>
                                </div>
                                <div class="col-sm-9 col-8">
                                    Lorem ipsum dolor sit amet, consectetur 
                                    adipisicing elit.
                                </div>
                                <div class="col-1">
                                    <a href="#"data-toggle="tooltip" title="Edit" data-placement="top">
                                        <i class="fa fa-edit fa-lg text-success mr-2"></i>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="#"data-toggle="tooltip" title="Delete" data-placement="top">
                                        <i class="fa fa-trash-o fa-lg text-danger"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid bg-3">
                            <div class="row py-3 mb-4 task-border align-items-center">
                                <div class="col-1">
                                    <input type="checkbox" checked>
                                </div>
                                <div class="col-sm-9 col-8">
                                    Lorem ipsum dolor sit amet, consectetur 
                                    adipisicing elit.
                                </div>
                                <div class="col-1">
                                    <a href="#"data-toggle="tooltip" title="Edit" data-placement="top">
                                        <i class="fa fa-edit fa-lg text-success mr-2"></i>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="#"data-toggle="tooltip" title="Delete" data-placement="top">
                                        <i class="fa fa-trash-o fa-lg text-danger"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid bg-4">
                            <div class="row py-3 mb-4 task-border align-items-center">
                                <div class="col-1">
                                    <input type="checkbox" checked>
                                </div>
                                <div class="col-sm-9 col-8">
                                    Lorem ipsum dolor sit amet, consectetur 
                                    adipisicing elit.
                                </div>
                                <div class="col-1">
                                    <a href="#"data-toggle="tooltip" title="Edit" data-placement="top">
                                        <i class="fa fa-edit fa-lg text-success mr-2"></i>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="#"data-toggle="tooltip" title="Delete" data-placement="top">
                                        <i class="fa fa-trash-o fa-lg text-danger"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---End of Task List-->
                    <!---Quick Post--->                      
                    <div class="col-xl-6 mt-5">
                        <div class="card rounded">
                            <div class="card-body">
                                <h5 class="text-dark text-center mb-4">
                                    Message d'état rapide
                                </h5>
                                <ul class="list-inline text-center py-3">
                                    <li class="list-inline-item">
                                        <a href="#"> <i class="fa fa-pencil-alt text-success"></i>
                                            <span class="h6 text-dark">Statut</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item mr-4">
                                        <a href="#"> <i class="fa fa-camera text-info"></i>
                                            <span class="h6 text-dark">Photo</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item mr-4">
                                        <a href="#"> <i class="fa fa-map-marker text-danger"></i>
                                            <span class="h6 text-dark">Enregistrement</span>
                                        </a>
                                    </li>
                                </ul>
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control py-2 mb-3" placeholder="Ton Statut">
                                        <button type="button" class="btn btn-block text-uppercase font-weight-bold text-light bg-primary bg-button py-2 mb-5">Soumettre le Post</button>
                                    </div>
                                </form>
                                <div class="row align-items-center mb-5">
                                    <div class="col-6">
                                        <div class="card bg-light">
                                            <i class="fa fa-calendar fa-5x text-info d-block m-auto py-3"></i>
                                            <div class="card-body">
                                                <p class="card-text text-center font-weight-bold text-uppercase">{{date('D,M Y')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card bg-light">
                                            <i class="fa fa-clock-o fa-5x  text-danger d-block m-auto py-3"></i>
                                            <div class="card-body">
                                                <p class="card-text text-center font-weight-bold text-uppercase">{{date('h:i A')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</section>
<!---End of Quick post-->

<!-- </div> -->
  
<div class="card-common">
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
</div>
--}}  

@endsection
