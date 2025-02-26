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

        <title>{{ config('app.name') }}&nbsp;&VerticalBar;&nbsp;@yield('title')</title>

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"> -->

        <!-- Scripts -->
        <!-- font icon  -->
        <link rel="shortcut icon" href="{{asset('assets/images/logos/smag.png')}}" type="image/x-icon">
        <!-- STYLESHEETS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.min.css') }}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.min.css')}}">
        <style>
            .d-right {
                text-align: right;
            }

            .card-title {
                font-style: oblique;
                text-transform: uppercase;
            }

            td,
            th {
                padding-right: 10px;
                text-align: center;
            }

            .form-label {
                font-style: normal;
                font-weight: bold;
                font-size: medium;
            }

            form {
                padding-left: 0.5cm;
                padding-right: 0.5cm;
            }

            .text-success {
                background-color: green;
                color: white;
            }

            .notecoef {
                color: black;
                font-style: italic;
                /* font: medium; */
            }

            .totalnotecoef {
                color: black;
                font-style: normal;
                /* font: bold; */
            }
        </style>
    </head>

    <body>
        <!--*******************
        Preloader start
    ********************-->
        {{-- <!-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> --> --}}
        <!--*******************
        Preloader end
    ********************-->

        <!--**********************************
        Main wrapper start
    ***********************************-->
        <div id="main-wrapper" class="show">

            <!--**********************************Nav header start*********************************-->
            @include('layouts.nav-header')
            <!--**********************************Nav header end***********************************-->

            <!--**********************************Chat box start***********************************-->
            {{-- @include('layouts.chatbox') --}}
            <!--**********************************Chat box End*************************************-->

            <!--**********************************Header start***********************************-->
            @include('layouts.header')
            <!--**********************************Header end ti-comment-alt*************************-->

            <!--**********************************Sidebar start***********************************-->
            @include('layouts.sidebar')
            <!--**********************************Sidebar end***********************************-->

            <!--**********************************Content body start***********************************-->
            <div class="content-body">
                @yield('content')
            </div>
            <!--**********************************Content body end***********************************-->


            <!--**********************************Footer start***********************************-->
            @include('layouts.footer')
            <!--**********************************Footer end***********************************-->
        </div>
        <!--**********************************
        Main wrapper end
    ***********************************-->
        <script src="{{asset('assets/vendor/global/global.min.js') }}"></script>
        {{-- <script src="{{asset('assets/vendor/ckeditor/ckeditor.js') }}"></script> --}}

        <!-- Chart sparkline plugin files -->
        <script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{asset('assets/js/plugins-init/sparkline-init.js') }}"></script>

        <!-- Chart Morris plugin files -->
        <script src="{{ asset('assets/vendor/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/morris/morris.min.js') }}"></script>

        <!-- Init file -->
        <script src="{{ asset('assets/js/plugins-init/widgets-script-init.js') }}"></script>

        <!-- Svganimation scripts -->
        <script src="{{ asset('assets/vendor/svganimation/vivus.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/svganimation/svg.animation.js') }}"></script>

        <!-- Demo scripts -->
        <script src="{{ asset('assets/js/dashboard/dashboard.js') }}"></script>

        <script src="{{ asset('assets/js/custom.min.js') }}"></script>
        <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
        {{--<script src="{{ asset('assets/js/demo.js') }}"></script> --}}
        <!-- affich param icon -->
        {{-- <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script> --}}
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="{{ asset('assets/js/dashboard/files/print.js') }}"></script>
        <script src="{{ asset('assets/js/dashboard/files/notes/notes.js') }}"></script>
        <script src="{{ asset('assets/js/calcul.js') }}"></script>
        <script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}}"></script>
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script> --}}
    </body>

</html>