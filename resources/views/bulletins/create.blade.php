@extends('layouts.app')
@section('title','Un Professeur')
@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Nouveau Professeur</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">Professeurs</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter un Professeur</a></li>
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
                    <form action="{{route('prof.store')}}" method="post" id="addProfForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="first_name">Nom</label>
                                    <input placeholder="Koffi" id="first_name" type="text" name="nom"
                                        class="form-control @error('nom') is-invalid @enderror" required
                                        value="{{old('nom')}}">
                                    @error('nom') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="last_name">Pr&eacute;noms</label>
                                    <input placeholder="Konan Paulin" id="last_name" type="text"
                                        class="form-control @error('prenoms') is-invalid @enderror" required
                                        name="prenoms" value="{{old('prenoms')}}">
                                    @error('prenoms') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="email_here">Email </label>
                                    <input placeholder="abcd@efg.xyz" id="email_here" type="email"
                                        class="form-control @error('email') is-invalid @enderror" required name="email"
                                        value="{{old('email')}}">
                                    @error('email') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="mobile_number">T&eacute;l&eacute;phone</label>
                                    <input placeholder="+225 0506439352" id="mobile_number" type="tel" maxlength="15"
                                        name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                                        required value="{{old('telephone')}}">
                                    @error('telephone') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Genre</label>
                                    <select class="form-control @error('sexe') is-invalid @enderror" name="sexe">
                                        <option value="" readonly desabled>Choisir le sexe</option>
                                        <option value="H">Homme</option>
                                        <option value="F">Femme</option>
                                    </select>
                                    @error('sexe') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Discipline</label>
                                    <select class="form-control @error('discip_princ') is-invalid @enderror"
                                        name="discip_princ" value="{{old('discip_princ')}}">
                                        <option desabled readonly value="0">Choisir la discipline</option>
                                        @forelse($diciplines as $item)
                                        <option value="{{$item->id}}">{{$item->libelle}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('discip_princ') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Discipline secondaire</label>
                                    <select class="form-control @error('discip_second') is-invalid @enderror"
                                        name="discip_second" value="{{old('discip_second')}}">
                                        <option desabled readonly value="0">Choisir la discipline secondaire</option>
                                        @forelse($diciplines as $item)
                                        <option value="{{$item->id}}">{{$item->libelle}}</option>
                                        @empty
                                        @endforelse
                                        <!-- <option value="Anglais">Anglais</option>
                                        <option value="Histoire-Geographie">
                                            Histoire-Geographie</option>
                                        <option value="Français">
                                            Français
                                        </option>
                                        <option value="Espagnol">
                                            Espagnol</option>
                                        <option value="Allemand">
                                            Allemand
                                        </option>
                                        <option value="Science de la vie et de la terre">
                                            Science de la vie et de la terre
                                        </option>
                                        <option value="Philisophie">
                                            Philisophie</option>
                                        <option value="Physique-Chimie">
                                            Physique-Chimie
                                        </option>
                                        <option value="Mathématiques">
                                            Mathématiques</option>
                                        <option value="Chinois">
                                            Chinois</option>
                                        <option value="Grec">Grec</option>
                                        <option value="Education Physique et Sportive">Education Physique et Sportive
                                        </option>
                                        <option value="Musique">Musique</option>
                                        <option value="Arabe">Arabe</option>
                                        <option value="Arts Plastiques">Arts Plastiques</option>
                                        <option value="EDHC">EDHC</option>
                                        <option value="Conduite">Conduite</option> -->
                                    </select>
                                    @error('discip_second') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 position-relative">
                                <label class="form-label" for="dlabPassword">Mot de passe</label>
                                <input type="password" name="password" id="dlabPassword"
                                    class="form-control @error('password') is-invalid @enderror"
                                    value="{{old('password')}}" placeholder="A@3hdgU&ijkghbh">
                                <span class="show-pass eye">
                                    <i class="fa fa-eye-slash"></i>
                                    <i class="fa fa-eye"></i>
                                </span>
                                @error('password') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group fallback w-100">
                                    <label class="form-label" for="avatar">Avatar</label>
                                    <input type="file" name="avatar" accept="images/" id="avatar"
                                        class="form-control @error('avatar') is-invalid @enderror" data-default-file="">
                                    @error('avatar') <span class="text text-danger">{{$message}}</span> @enderror
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