@extends('layouts.app')
@section('title','Modification d\'une école')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Modification &Eacute;cole</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">&Eacute;cole</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Modification</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire de modification d&aacute;une &eacute;cole</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('etablissements.update',$etablissement->id) }}" method="post" id="editEcoleForm" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="first_name">Nom</label>
                                    <input placeholder="Saisissez le nom de l'école" id="first_name" type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" required @if(old('nom')) value="{{old('nom')}}" @else value="{{$etablissement->nom}}" @endif autofocus>
                                    @error('nom') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="email_here">Email </label>
                                    <input placeholder="abc@efg.xyz" id="email_here" type="email" class="form-control @error('email') is-invalid @enderror" required name="email" @if(old('email')) value="{{old('email')}}" @else value="{{$etablissement->email}}" @endif>
                                    @error('email') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="mobile_number">T&eacute;l&eacute;phone</label>
                                    <input placeholder="+225 0506439352" id="mobile_number" type="tel" maxlength="15" name="telephone" class="form-control @error('telephone') is-invalid @enderror" required @if(old('telephone')) value="{{old('telephone')}}" @else value="{{$etablissement->telephone}}" @endif>
                                    @error('telephone') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="adresse">Adresse Postale</label>
                                    <input placeholder="21 BP 456 Abidjan 01" id="adresse" type="text" name="adresse" class="form-control @error('adresse') is-invalid @enderror" @if(old('adresse')) value="{{old('adresse')}}" @else value="{{$etablissement->adresse_postale}}" @endif>
                                    @error('adresse') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="redoublant">Statut</label><br>
                                <label for="statutpu">Public
                                    <input type="radio" class="form-radio @error('statut') is-invalid @enderror" name="statut" id="statutpu" value="Public">
                                </label>
                                &nbsp;&nbsp;&nbsp;
                                <label for="Priv">Priv&eacute;
                                    <input type="radio" class="form-radio @error('statut') is-invalid @enderror" name="statut" id="Priv" value="Privé">
                                </label>
                                &nbsp;&nbsp;&nbsp;
                                <label for="SemiPriv">Semi-Priv&eacute;
                                    <input type="radio" class="form-radio @error('statut') is-invalid @enderror" name="statut" id="SemiPriv" value="Semi-Privé">
                                </label>
                                @error('statut') <span class="text text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="code">Code</label>
                                        <input placeholder="00064393" id="code" type="text" maxlength="10" name="code" class="form-control @error('code') is-invalid @enderror col-6" required @if(old('code')) value="{{old('code')}}" @else value="{{$etablissement->code}}" @endif>
                                        @error('code') <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="ville">Ville</label>
                                        <input placeholder="Abidjan" id="ville" type="text" name="ville" class="form-control @error('ville') is-invalid @enderror" @if(old('ville')) value="{{old('ville')}}" @else value="{{$etablissement->ville}}" @endif>
                                        @error('ville') <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <label class="form-label" for="localisation">Localisation</label>
                                <textarea name="localisation" id="localisation" class="form-control @error('localisation') is-invalid @enderror" placeholder="Indiquez clairement la localisation de votre école" value="{{old('localisation')}}" rows="4">{{$etablissement->localisation}}</textarea>
                                @error('localisation') <span class="text text-danger">{{$message}}</span>@enderror
                            </div>
                        </div><br>
                        {{--<div class="row">
                            <div class="col-6">
                                <label class="form-label" for="logo">Logo</label>
                                <input type="file" name="logo" accept="image/*" id="logo"
                                    class="form-control @error('logo') is-invalid @enderror" data-default-file="">
                                @error('logo') <span class="text text-danger">{{$message}}</span>@enderror
                </div>
                <div class="col-6">
                    <label class="form-label" for="photo">Photo</label>
                    <input type="file" name="photo" accept="image/*" id="photo" class="form-control @error('photo') is-invalid @enderror" data-default-file="">
                    @error('photo') <span class="text text-danger">{{$message}}</span>@enderror
                </div>
            </div>--}}
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