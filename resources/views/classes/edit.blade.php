@extends('layouts.app')
@section('title','')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Modifier classe</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">Classes</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Liste des classes</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire</h5>
                </div>
                <div class="card-body">
                     <form action="{{route('classes.store') }}" method="post" id="addPeriodForm"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="niveau">Niveau</label>
                                    <select placeholder="Choisissez le niveau" id="niveau" name="niveau"
                                        class="form-control @error('niveau') is-invalid @enderror" required
                                        value="{{old('niveau')}}" autofocus>
                                        @forelse($niveaus as $item)
                                        <option value="{{$item->id}}">{{$item->libelle}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('niveau') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="effectif">E&eacute;ffectif</label>
                                    <input type="number" min="1" max="180"
                                        placeholder="Choisissez l'éffectif de la classe" id="effectif" name="effectif"
                                        class="form-control @error('effectif') is-invalid @enderror" required
                                        value="{{old('effectif')}}" autofocus pattern="/^[0-9]{1-4}$/">
                                    @error('effectif') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <label class="form-label" for="nom">Nom de la classe</label>
                                    <input type="text" name="nom" id="nom" value="{{old('nom')}}"
                                        class="form-control @error('nom') is-invalid @enderror" placeholder="6ème5">
                                    @error('nom') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>


                        <br><br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 d-right">
                                <button type="reset" class="btn btn-danger light">Reprendre</button>
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop