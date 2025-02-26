@extends('layouts.app')
@section('title','Ajouter un niveau')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Nouveau niveau</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">Niveau</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter</a></li>
            </ol>
        </div>
    </div>
    @include("layouts.flash")
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire d&acute;ajout d&acute;un niveau</h5>

                </div>
                <div class="card-body">
                    <form action="{{route('niveaus.store') }}" method="post" id="addNiveauForm"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="anneeN">Ann&eacute;e</label>
                                    <select placeholder="Choisissez l'année" id="anneeN" name="annee"
                                        class="form-control @error('annee') is-invalid @enderror" required
                                        value="{{old('annee')}}" autofocus>
                                        @forelse($annees as $item)
                                        <option value="{{$item->id}}" selected>{{$item->libelle}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('annee') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="libelForNivYear">Libell&eacute; du cycle</label>
                                    <select name="libelle" id="libelForNivYear" value="{{old('libelle')}}"
                                        class="form-control @error('libelle') is-invalid @enderror">

                                    </select>
                                    @error('libelle') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="pt">
                                    <label class="form-label" for="niveau">Niveaux</label>
                                    <select id="niveau" name="niveau"
                                        class="form-control @error('niveau') is-invalid @enderror" required
                                        value="{{old('niveau')}}">
                                    </select>
                                    @error('niveau') <span class="text text-danger">{{$message}}</span>@enderror
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