@extends('layouts.app')
@section('title','Modification d\'une période')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Periodes</h4>
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
                    <h5 class="card-title">Formulaire de modification d&acute;une p&eacute;riode</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('periodes.update',$periode->id) }}" method="post" id="editEcoleForm"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="annee">Ann&eacute;e</label>
                                    <select placeholder="Choisissez l'année" id="annee" name="annee"
                                        class="form-control @error('annee') is-invalid @enderror" autofocus>
                                        <option value="{{$periode->annee_academique_id}}" selected>
                                            {{$periode->annee->libelle}}
                                        </option>

                                    </select>
                                    @error('annee') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="type">Type</label>
                                    <select placeholder="Choisissez le type l'année" id="type" name="type"
                                        class="form-control @error('type') is-invalid @enderror" required
                                        value="{{old('type')}}" autofocus>
                                        <option value="Trimestre">Trimestre</option>
                                        <option value="Semestre">Semestre</option>
                                    </select>
                                    @error('type') <span class="text text-danger">{{$message}}</span>@enderror
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