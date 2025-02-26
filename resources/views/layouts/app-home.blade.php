<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="application gestion école">
    <meta name="author" content="All Tech Services">
    <meta name="description"
        content="Application web de gestion d'etablissement scolaire. L'application vous permet de suivre en temps réel l'évolution des cours de chaque enseignant, saisir les notes des élèves et calculer leurs moyennes dans chaque matière afin d'imprimer les bulletins scolaires.">

    <title>{{ config('app.name') }}&VerticalBar;&nbsp;@yield('title')</title>

    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"> -->

    <!-- Scripts -->
    <link rel="shortcut icon" href="{{asset('assets/images/logos/smag.png')}}" type="image/x-icon">
    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    {{-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> --}}
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="show">

        <!--**********************************Content body start***********************************-->
        <div class="content" style="margin-top: 10px;">
            @yield('content')
        </div>
        <!--**********************************Content body end***********************************-->


        <!--**********************************Footer start***********************************-->
        {{--@include('layouts.footer')--}}
        <!--**********************************Footer end***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <script src="{{asset('assets/vendor/global/global.min.js') }}"></script>
    <!-- Demo scripts -->
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
</body>

</html>