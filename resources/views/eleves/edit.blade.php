@extends('layouts.app')
@section('title','Modification d\'élève')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>El&egrave;ves</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">El&egrave;ve</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edition</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire de modification d&acute;un &eacute;l&egrave;ve</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('eleves.update',$eleve->id)}}" method="post" id="EditEleveForm"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="first_name">Nom</label>
                                    <input placeholder="Koffi" id="first_name" type="text" name="nom"
                                        class="form-control @error('nom') is-invalid @enderror" @if(old('nom'))
                                        value="{{old('nom')}}" @else value="{{$eleve->nom}}" @endif>
                                    @error('nom') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="last_name">Pr&eacute;noms</label>
                                    <input placeholder="Konan Paulin" id="last_name" type="text"
                                        class="form-control @error('prenoms') is-invalid @enderror" required
                                        name="prenoms" @if(old('prenoms')) value="{{old('prenoms')}}" @else
                                        value="{{$eleve->prenoms}}" @endif>
                                    @error('prenoms') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="datenais">Date de naisssance</label>
                                    <div class="input-hasicon mb-xl-0 mb-3">
                                        <input type="date" placeholder="01/01/2010" name="datenais"
                                            class="datepicker-default form-control @error('datenais') is-invalid @enderror"
                                            id="datenais" @if(old('datenais')) value="{{old('datenais')}}" @else
                                            value="{{$eleve->date_nais}}" @endif>
                                        @error('datenais') <span class="text text-danger">{{$message}}</span>@enderror
                                        <div class="icon"><i class="far fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="lieunais">Lieu de naisssance</label>
                                    <input placeholder="Cocody" id="lieunais" type="text"
                                        class="form-control @error('lieunais') is-invalid @enderror" required
                                        name="lieunais" @if(old('lieunais')) value="{{old('lieunais')}}" @else
                                        value="{{$eleve->lieu_nais}}" @endif>
                                    @error('lieunais') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Genre</label>
                                    <select class="form-control @error('sexe') is-invalid @enderror" name="sexe">
                                        <option value="H" selected>Homme</option>
                                        <option value="F">Femme</option>
                                    </select>
                                    @error('sexe') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="nationnalite">Nationnalit&eacute;</label>
                                    <input placeholder="Ivoirienne" id="nationnalite" type="text" name="nationnalite"
                                        class="form-control @error('nationnalite') is-invalid @enderror"
                                        @if(old('nationnalite')) value="{{old('nationnalite')}}" @else
                                        value="{{$eleve->nationnalite}}" @endif required>
                                    @error('nationnalite') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="matricule">Matricule</label>
                                    <input type="text" class="form-control @error('matricule') is-invalid @enderror"
                                        name="matricule" @if(old('matricule')) value="{{old('matricule')}}" @else
                                        value="{{$eleve->matricule}}" @endif id="matricule">
                                    @error('matricule') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="redoublant">Redoublant</label>
                                <div class="form-group">
                                    <label for="ouired">Oui
                                        <input type="radio" class="form-radio" name="redoublant" id="ouired"
                                            value="Oui">
                                    </label>
                                    &nbsp;&nbsp;&nbsp;
                                    <label for="nonred">Non
                                        <input type="radio" class="form-radio @error('redoublant') is-invalid @enderror"
                                            name="redoublant" id="nonred" value="Non" checked>
                                        @error('redoublant') <span class="text text-danger">{{$message}}</span>@enderror
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">R&eacute;gime</label>
                                <div class="form-group">
                                    <label for="ouireg">Boursier
                                        <input type="radio" class="form-radio" name="regime" id="ouireg"
                                            value="Boursier" checked>
                                    </label>
                                    &nbsp;&nbsp;&nbsp;
                                    <label for="nonreg">Non Boursier
                                        <input type="radio" class="form-radio @error('regime') is-invalid @enderror"
                                            name="regime" id="nonreg" value="Non Boursier">
                                    </label>
                                    @error('regime') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="affecte">Affect&eacute;(e)</label>
                                <div class="form-group">
                                    <label for="ouiaf">Oui
                                        <input type="radio" class="form-radio" name="affecte" id="ouiaf" value="Oui"
                                            checked>
                                    </label>
                                    &nbsp;&nbsp;&nbsp;
                                    <label for="nonaf">Non
                                        <input type="radio" class="form-radio @error('affecte') is-invalid @enderror"
                                            name="affecte" id="nonaf" value="Non">
                                        @error('affecte') <span class="text text-danger">{{$message}}</span>@enderror
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label class="form-label" for="classe">Classe</label>
                                    <select class="form-control @error('classe') is-invalid @enderror" name="classe"
                                        id="classe" value="{{old('classe')}}">
                                        @forelse($classe as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->libelle}}
                                        </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('classe') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group fallback w-100">
                                    <label class="form-label" for="photo">Photo(100*100)</label>
                                    <input type="file" name="photo" accept="image/*" id="photo"
                                        class="form-control @error('photo') is-invalid @enderror" data-default-file="">
                                    @error('photo') <span class="text text-danger">{{$message}}</span>@enderror
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