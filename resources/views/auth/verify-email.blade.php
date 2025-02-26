@extends("layouts.app-home")
@section("title","Verification-de-mail")
@section("content")
<div class="row">
    <div class="col-md-4 col-xl-4 col-lg-4"></div>
    <div class="col-md-4 col-xl-4 col-lg-4 col-xs-12 col-sm-12 content-justify">
        <fieldset
            style="border: red 2px; background-color:bisque; padding: 5%; margin:25% 10% 25% 10%; border-radius:5%;">
            <legend style="border: 1px; text-align:center;">Identification&nbsp;<span class="fa fa-lock"></span>
            </legend>
            <hr>
            <div class="mb-4 text-sm text-gray-600">
                Merci pour votre inscription! Avant de commencer,pouvez-vous verifier votre adresse email en cliquant
                sur le lien
                qui vous a &eacute;t&eacute; envoy&eacute; &agrave; votre adresse email utilis&eacute;e
                pour votre inscription.
            </div>

            @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                Un nouveau lien de verification a &eacute;t&eacute; envoy&eacute; &agrave; votre adresse email
                utilis&eacute;e
                pour votre inscription.
            </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <button type="submit" class="btn btn-primary"> Renvoyer le mail de verification</button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Déconnexion') }}
                    </button>
                </form>
            </div>
    </div>
</div>
<div class="col-md-4 col-xl-4 col-lg-4"></div>
@stop