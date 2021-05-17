@extends('layouts.master')
   
@section('content')

<style>
    form {
    width: 50%;
    margin: 0 auto;
    }
</style>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Modifier le diagnostic de {{ $bovins[0]->nom }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary fa fa-reply-all" href="{{ route('diagnostics.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   
    @if($message = Session::get('error'))
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert" type="button">x</button>
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif 
  
    <form action="{{ route('diagnostics.update',$data->idDiagnostic) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row card shadow">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date Maladie:</strong>
                    <input type="date" name="dateMaladie" value="{{ $data->dateMaladie }}" class="form-control">
                    <span style="color:red">@error('dateMaladie') {{$message}} @enderror</span>
                
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date Guérison:</strong>
                    <input type="date" name="dateGuerison" value="{{ $data->dateGuerison }}" class="form-control">
                    <span style="color:red">@error('dateGuerison') {{$message}} @enderror</span>
                
                </div>
            </div>
        
            <!--  -->
            <div class="form-group col-md-12">
                <label for="race"><strong>Nom Bovin:</strong></label>
                <div class="">
                    <select name="idBovin" class="form-control" required>
                        @foreach($bovins as $bovin[0])
                        <option value="{{ $bovin[0]->idBovin }}"

                            @if($bovin[0]->idBovin == $bovins[0]->bovin_id)
                            selected
                            @endif
                        
                        >
                            {{ $bovin[0]->nom }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--  -->

            <!--  -->
            <div class="form-group col-md-12">
                <label for="race"><strong>Nom Maladie:</strong></label>
                <div class="">
                    <select name="idMaladie" class="form-control" required>
                        @foreach($maladies as $maladie[0])
                        <option value="{{ $maladie[0]->idMaladie }}"

                            @if($maladie[0]->idMaladie == $maladies[0]->maladie_id)
                            selected
                            @endif
                        
                        >
                            {{ $maladie[0]->nomMaladie }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--  -->

            <!-- Default input -->
            <div class="form-group col-md-12">
                <!--  -->
                    <label ><strong>Choisir l'état de Santé:</strong></label>
                    <div class="">
                        <select name="etatDeSante" class="form-control" required>
                            
                            <option value="{{ $bovins[0]->etatDeSante }} "

                                @if($bovins[0]->idBovin == $bovins[0]->etatDeSante)
                                selected
                                @endif
                            
                            >
                                {{ $bovins[0]->etatDeSante }}
                            </option>
                            @if($bovins[0]->etatDeSante == "Sain")
                                <option>Malade</option>
                            @endif
                            @if($bovins[0]->etatDeSante == "Malade")
                                <option>Sain</option>
                            @endif
                            
                            {{-- @endforeach --}}
                        </select>
                    </div>
                    <div class="clearfix"></div>
                
                <!--  -->
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-block btn-primary">Valider</button>
            </div>
        </div>
   
    </form>
@endsection