@extends('layouts.app-home')
@section('title','Connexion')
@section('content')
<div class="fix">
    <div class="container">
        <div class="row" style="margin-top: 1cm;">
            <div class="col-12">&nbsp;</div>
        </div>
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
                        <h4 class="text-center mb-4"><span class="fa fa-lock"></span>&nbsp;CONNECTEZ VOUS A VOTRE COMPTE
                        </h4>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label class="form-label" for="username">E-mail</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="abdc@ghi.xyz"
                                    id="username" autofocus>
                                @error('email') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-4 position-relative">
                                <label class="form-label" for="dlabPassword">Mot de passe</label>
                                <input type="password" name="password" id="dlabPassword" class="form-control" value="">
                                <span class="show-pass eye">
                                    <i class="fa fa-eye-slash"></i>
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                            <div class="form-row d-flex flex-wrap justify-content-between mt-4 mb-2">
                                <div class="form-group">
                                    <div class="form-check custom-checkbox ms-1">
                                        <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                        <label class="form-check-label" for="basic_checkbox_1">Me souvenir</label>
                                    </div>
                                </div>
                                <div class="form-group ms-2">
                                    @if (Route::has('password.request'))
                                    <a class="btn-link" href="{{ route('password.request') }}">
                                        Mot de passe oubli&eacute;?
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>Pas de compte? <a class="text-primary" href="/register">Cr&eacute;&eacute;r
                                    maintenant</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop