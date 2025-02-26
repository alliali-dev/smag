@extends('layouts.app-home')
@section('title','Inscription')
@section('content')
<div class="fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
                <div class="card mb-0 h-auto">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @include('layouts.flash')
                            </div>
                        </div>
                        <div class="text-center mb-2">
                            <a href="/">
                                <!-- logo -->
                            </a>
                        </div>
                        <h4 class="text-center mb-4"><span class="fa fa-pencil"></span>&nbsp;CREEZ VOTRE
                            COMPTE DE DIRIGEANT
                        </h4>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="form-label" for="nom">Nom</label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="Koffi" id="nom" value="{{old('nom')}}">
                                @error('nom') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="prenoms">Pr&eacute;noms</label>
                                <input type="text" name="prenoms" class="form-control @error('prenoms') is-invalid @enderror" placeholder="Guy Marcel" id="prenoms" value="{{old('prenoms')}}">
                                @error('prenoms') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="sexe">Sexe</label>
                                <select name="sexe" class="form-control @error('sexe') is-invalid @enderror" id="sexe" value="{{old('sexe')}}">
                                    <option value="0" desabled>Choisissez</option>
                                    <option value="H">Homme</option>
                                    <option value="F">Femme</option>
                                </select>
                                @error('sexe') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">T&eacute;l&eacute;phone</label>
                                <input type="tel" name="telephone" class="form-control @error('telephone') is-invalid @enderror" placeholder="+225 0506439352" id="phone" value="{{old('telephone')}}">
                                @error('telephone') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="profile_photo">Photo</label>
                                <input type="file" name="profile_photo" class="form-control @error('profile_photo') is-invalid @enderror" id="profile_photo" value="{{old('profile_photo')}}" accept="image/*">
                                @error('profile_photo') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">E-mail</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="abdc@ghi.xyz" id="email" value="{{old('email')}}">
                                @error('email') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-4 position-relative">
                                <label class="form-label" for="dlabPassword">Mot de passe</label>
                                <input type="password" name="password" id="dlabPassword" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                                <span class="show-pass eye">
                                    <i class="fa fa-eye-slash"></i>
                                    <i class="fa fa-eye"></i>
                                </span>
                                @error('password') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-4 position-relative">
                                <label class="form-label" for="password_confirmation">Confirmer votre Mot de
                                    passe</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{old('password_confirmation')}}">
                                <span class="sp eye">
                                    <i class="fa fa-eye-slash"></i>
                                    <i class="fa fa-eye"></i>
                                </span>
                                @error('password_confirmation') <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <a class="btn-link" href="/">
                                Se connecter?
                            </a>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
    @stop