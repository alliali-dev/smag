@extends('layouts.app')
@section('title','Nouvelle année académique')
@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Ann&eacute;e acad&eacute;mique</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Ann&eacute;e acad&eacute;mique</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Nouvelle</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire de cr&eacute;ation d&acute;Ann&eacute;e acad&eacute;mique</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('annees.store')}}" method="post" id="addYearForm">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="datedebut">D&eacute;but</label>
                                    <input type="date" id="datedebut"
                                        class="form-control @error('datedebut') is-invalid @enderror" required
                                        name="datedebut" value="{{old('datedebut')}}" title="01/01/2024">
                                    @error('datedebut') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="datefin">Fin</label>
                                    <input id="datefin" type="date"
                                        class="form-control  @error('datefin') is-invalid @enderror" required
                                        name="datefin" value="{{old('datefin')}}" title="25/06/2025">
                                    @error('datefin') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="libelle">Ann&eacute;e
                                        acad&eacute;mique</label>
                                    <input placeholder="2024-2025" id="libelle" type="text" name="libelle"
                                        class="form-control" required value="{{old('libelle')}}">
                                    @error('libelle') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
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