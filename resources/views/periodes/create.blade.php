@extends('layouts.app')
@section('title','Ajouter une période')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Nouvelle Periode</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">Periode</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter</a></li>
            </ol>
        </div>
    </div>
    @include("layouts.flash")
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire d&acute;ajout d&acute;une p&eacute;riode</h5>

                </div>
                <div class="card-body">
                    <form action="{{route('periodes.store') }}" method="post" id="addPeriodForm"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="annee">Ann&eacute;e acad&eacute;mique</label>
                                    <select id="annee" name="annee"
                                        class="form-control @error('annee') is-invalid @enderror" required
                                        value="{{old('annee')}}" autofocus>
                                        <option value="" selected disabled>Choisissez l'année</option>
                                        @forelse($annees as $item)
                                        <option value="{{$item->id}}">{{$item->libelle}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('annee') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="type">Type</label>
                                    <select id="type" name="type"
                                        class="form-control @error('type') is-invalid @enderror" required
                                        value="{{old('type')}}">
                                        <option value="" selected disabled>Choisissez le type l'année</option>
                                        <option value="Trimestre">Trimestre</option>
                                        <option value="Semestre">Semestre</option>
                                    </select>
                                    @error('type') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>
                        {{--
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <label class="form-label" for="libel">Libell&eacute; p&eacute;riode</label>
                                    <select name="libelle" id="libel" value="{{old('libelle')}}"
                        class="form-control @error('libelle') is-invalid @enderror">
                        <option>Choisissez le libellé de l'année</option>
                        </select>
                        @error('libelle') <span class="text text-danger">{{$message}}</span>@enderror
                </div>
            </div>
        </div>
        --}}


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