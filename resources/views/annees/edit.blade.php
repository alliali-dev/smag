@extends('layouts.app')
@section('title','Modification d\'année académique')
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edition</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <h5 class="card-title">Formulaire de modification d&acute;Ann&eacute;e acad&eacute;mique</h5>
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{route('annees.update',$annee->id)}}" method="post" id="addYearForm">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="datedebut">D&eacute;but</label>
                                    <input id="datedebut" type="date"
                                        class="form-control @error('datedebut') is-invalid @enderror" name="datedebut"
                                        required @if(old('datedebut')) value="{{old('datedebut')}}" @else
                                        value="{{$annee->debut_annee}}" @endif>
                                    @error('datedebut') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="datedefin">Fin</label>
                                    <input type="date" name="datedefin" id="datedefin"
                                        class="form-control @error('datedefin') is-invalid @enderror"
                                        @if(old('datedefin')) value="{{old('datedefin')}}" @else
                                        value="{{$annee->fin_annee}}" @endif>
                                    @error('datedefin') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="libelle">Ann&eacute;e
                                        acad&eacute;mique</label>
                                    <input placeholder="2024-2025" id="libelle" type="text" name="libelle"
                                        class="form-control" required @if(old('libelle')) value="{{old('libelle')}}"
                                        @else value="{{$annee->libelle}}" @endif>
                                    @error('libelle') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 d-right">
                                <button type="reset" class="btn btn-danger light">Reprendre</button>
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary" id="btn-v">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop