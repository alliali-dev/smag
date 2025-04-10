@extends('layouts.app')
@section('title','Nouvel élève')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Nouveau El&egrave;ves</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">El&egrave;ves</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter un El&egrave;ves</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire d&acute;inscription d&acute;un &eacute;l&egrave;ve</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-2 col-sm-4">
                            <div class="form-group offset-1">
                                {{-- <label class="form-label" for="matriculeS">Entrez le Matricule pour rechercher</label> --}}
                                <input type="search"
                                    class="form-control form-input @error('matriculeS') is-invalid @enderror align-center"
                                    name="matriculeS" value="{{old('matriculeS')}}" id="matriculeS"
                                    pattern="regex:/^[0-9]{8}?[A-Z]{1}$/" placeholder="07055027R"
                                    title="Respectez ce format: chiffres puis une(1) lettre majuscule">
                                <small>Entrez le Matricule pour rechercher</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-sm-offset-1 col-md-1 col-lg-1 col-xl-2">
                            <div class="form-group">
                                <button class="btn btn-primary search_icon c-pointer" id="search-btn">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                            </div>
                        </div>
                        @error('matriculeS') <span class="text text-danger">{{$message}}</span>@enderror
                    </div>

                    <form action="{{route('eleves.store')}}" method="post" id="addEleveForm">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="first_name">Nom</label>
                                    <input placeholder="Koffi" id="first_name" type="text" name="nom"
                                        class="form-control @error('nom') is-invalid @enderror" value="{{old('nom')}}">
                                    @error('nom') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="last_name">Pr&eacute;noms</label>
                                    <input placeholder="Konan Paulin" id="last_name" type="text"
                                        class="form-control @error('prenoms') is-invalid @enderror" required
                                        name="prenoms" value="{{old('prenoms')}}">
                                    @error('prenoms') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="datenais">Date de naisssance</label>
                                    <div class="input-hasicon mb-xl-0 mb-3">
                                        <input type="date" placeholder="01/01/2010" name="datenais"
                                            class="form-control @error('datenais') is-invalid @enderror" id="datenais"
                                            required value="{{old('datenais')}}">
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
                                        name="lieunais" value="{{old('lieunais')}}">
                                    @error('lieunais') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Genre</label>
                                    <select class="form-control @error('sexe') is-invalid @enderror" name="sexe">
                                        <option value="" selected disabled>Choisissez le sexe</option>
                                        <option value="M">Homme</option>
                                        <option value="F">Femme</option>
                                    </select>
                                    @error('sexe')
                                    <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="nationnalite">Nationnalit&eacute;</label>
                                    <input placeholder="Ivoirienne" id="nationnalite" type="text" name="nationnalite"
                                        class="form-control @error('nationnalite') is-invalid @enderror"
                                        value="{{old('nationnalite')}}" required>
                                    @error('nationnalite') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="matricule">Matricule</label>
                                    <input type="text" class="form-control @error('matricule') is-invalid @enderror"
                                        name="matricule" value="{{old('matricule')}}" id="matricule"
                                        pattern="[0-9]{8}[A-Z]{1}" title="8 chiffres suivi d'une lettre majuscule.">
                                    @error('matricule')
                                    <span class="text text-danger">{{$message}}</span>@enderror
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
                                        @error('redoublant')
                                        <span class="text text-danger">
                                            {{$message}}</span>@enderror
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
                                        <option value="{{$item->id}}">{{$item->libelle}}</option>
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