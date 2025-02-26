@extends('layouts.app')
@section('title','Intervention Professeur')
@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Intervention Professeur</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">Interventions</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter une intervention</a></li>
            </ol>
        </div>
    </div>
    @include('layouts.flash')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('interventions.store')}}" method="post" id="addIntervForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-sm-6 col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Classe</label>
                                    <select class="form-control @error('classse') is-invalid @enderror" name="classse"
                                        value="{{old('classse')}}">
                                        <option desabled readonly value="0">Choisir la classe</option>
                                        @forelse($classes as $item)
                                        <option value="{{$item->id}}" @if (old('classse')==$item->id) {{"selected"}}
                                            @endif>{{$item->libelle}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('classse') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6  col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Professeur</label>
                                    <select class="form-control @error('prof') is-invalid @enderror" name="prof"
                                        value="{{old('prof')}}">
                                        <option desabled readonly value="0">Choisir le Professeur</option>
                                        @forelse($profs as $item)
                                        <option value="{{$item->id}}" @if (old('prof')==$item->id) {{"selected"}}
                                            @endif>{{$item->nom." ".$item->prenoms}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('prof') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 col-md-3">
                                <label class="form-label" for="pp">Professeur Principal</label><br>
                                <label for="ppn">NON
                                    <input type="radio" class="form-radio @error('pp') is-invalid @enderror" name="pp"
                                        id="ppn" value="0" @if (old('pp')==0) {{"checked"}} @endif>
                                </label>
                                &nbsp;&nbsp;&nbsp;
                                <label for="ppo">OUI
                                    <input type="radio" class="form-radio @error('pp') is-invalid @enderror" name="pp"
                                        id="ppo" value="1" @if (old('pp')==1) {{"checked"}} @endif>
                                </label>
                                @error('pp') <span class="text text-danger">{{$message}}</span>@enderror
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
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