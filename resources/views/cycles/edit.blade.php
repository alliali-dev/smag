@extends('layouts.app')
@section('title','Modification d\'un cycle')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>cycles</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">periode</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Modification</a></li>
            </ol>
        </div>
    </div>
    @include("layouts.flash")
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire de modification d&acute;un cycle</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('cycles.update',$cycle->id) }}" method="post" id="editEcoleForm"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="annee">Ann&eacute;e</label>
                                    <select placeholder="Choisissez l'année" id="annee" name="annee"
                                        class="form-control @error('annee') is-invalid @enderror" required
                                        value="{{old('annee')}}" autofocus>
                                        <option value="{{$cycle->annee->id}}" selected>{{$cycle->annee->libelle}}
                                        </option>
                                    </select>
                                    @error('annee') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="ecole">Etablissement</label>
                                    <select placeholder="Choisissez l'établissement" id="ecole" name="ecole"
                                        class="form-control @error('ecole') is-invalid @enderror" required
                                        value="{{old('ecole')}}" autofocus>

                                        <option value="{{$cycle->etablissement->id}}" selected>
                                            {{$cycle->etablissement->nom}}
                                        </option>
                                    </select>
                                    @error('ecole') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="libel">Libell&eacute; du cycle</label>
                                    <select name="libelle" id="libel" value="{{old('libelle')}}"
                                        class="form-control @error('libelle') is-invalid @enderror">
                                        <option>Choisissez le libellé du cycle</option>
                                        <option value="1er Cycle">1er Cycle</option>
                                        <option value="2e Cycle">2e Cycle</option>
                                    </select>
                                    @error('libelle') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>


                        <br><br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 d-right">
                                <button type="reset" class="btn btn-danger light">Reprendre</button>
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop