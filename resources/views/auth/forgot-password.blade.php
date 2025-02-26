@extends('layouts.app-home')
@section("title","Mot-de-passe-oublié")
@section('content')
<div class="fix-wripper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
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
                        <h4 class="text-center mb-4">Envoi du lien&nbsp;<span class="fa fa-envelope"></span>
                        </h4>
                        <div class="mb-4 text-sm text-white-100">
                            Ne vous inquiètez pas si vous avez oubliez votre mot de passe. Entrez juste votre adresse
                            email et nous
                            vous enverrons un lien vous permettant de choisir un nouveau mot de passe.
                        </div>
                        <hr>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label class="form-label" for="email">E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="abdc@ghi.xyz"
                                    id="email" value="{{old('email')}}">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Envoyer le lien de
                                    réinitialisation</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <a class="btn-link" href="/">
                                Se connecter?
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop