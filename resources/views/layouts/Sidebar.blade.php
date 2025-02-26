<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Menu Principal</li>

            @if(Auth::check())
            @switch(auth()->user()->role_id)
            @case(1)
            <li>
                <a href="{{route('dashboard')}}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Espace Administrateur</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Professeurs</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('prof.index')}}">Liste des Professeurs</a></li>
                    <li><a href="{{route('prof.create')}}">Ajouter un Professeur</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">El&egrave;ves</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('eleves.index')}}">Liste des El&egrave;ves</a></li>
                    <li><a href="{{route('eleves.create')}}">Ajouter un El&egrave;ve</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-graduation-cap"></i>
                    <span class="nav-text">Ann&eacute;e accad&eacute;mique</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('annees.create')}}">Cr&eacute;er</a></li>
                    <li><a href="{{route('annees.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-database-1"></i>
                    <span class="nav-text">Periodes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('periodes.create')}}">Ajouter</a></li>
                    <li><a href="{{route('periodes.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-book"></i>
                    <span class="nav-text">Etablissements</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('etablissements.create') }}">Ajouter</a></li>
                    <li><a href="{{ route('etablissements.index') }}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Cycles</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('cycles.create')}}">Ajouter</a></li>
                    <li><a href="{{route('cycles.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-gift"></i>
                    <span class="nav-text">Niveaux</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('niveaus.create')}}">Ajouter</a></li>
                    <li><a href="{{route('niveaus.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="la la-signal"></i>
                    <span class="nav-text">S&eacute;ries</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('series.create')}}">Ajouter</a></li>
                    <li><a href="{{route('series.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-dollar"></i>
                    <span class="nav-text">Classes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('classes.create')}}">Ajouter</a></li>
                    <li><a href="{{route('classes.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Evaluations</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('evaluations.create')}}">Ajouter</a></li>
                    <li><a href="{{route('evaluations.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-plus-square-o"></i>
                    <span class="nav-text">Interventions</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('interventions.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-file-text"></i>
                    <span class="nav-text">Utilisateurs</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="#">Ajouter</a></li>
                    <li><a href="#">Liste</a></li>
                </ul>
            </li>
            @break;
            @case(2)
            <li>
                <a href="{{route('dashboard')}}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Espace Dirigeant</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-book"></i>
                    <span class="nav-text">Etablissements</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{ route('etablissements.create') }}">Ajouter</a>
                    </li>
                    <li>
                        <a href="{{ route('etablissements.index') }}">Liste</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-graduation-cap"></i>
                    <span class="nav-text">Ann&eacute;e accad&eacute;mique</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('annees.create')}}">Cr&eacute;er</a></li>
                    <li><a href="{{route('annees.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-database-1"></i>
                    <span class="nav-text">Periodes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('periodes.create')}}">Ajouter</a></li>
                    <li><a href="{{route('periodes.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Cycles</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('cycles.create')}}">Ajouter</a></li>
                    <li><a href="{{route('cycles.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-gift"></i>
                    <span class="nav-text">Niveaux</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('niveaus.create')}}">Ajouter</a></li>
                    <li><a href="{{route('niveaus.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="la la-signal"></i>
                    <span class="nav-text">S&eacute;ries</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('series.create')}}">Ajouter</a></li>
                    <li><a href="{{route('series.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-dollar"></i>
                    <span class="nav-text">Classes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('classes.create')}}">Ajouter</a></li>
                    <li><a href="{{route('classes.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Professeurs</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('prof.create')}}">Ajouter un Professeur</a></li>
                    <li><a href="{{route('prof.index')}}">Liste des Professeurs</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-plus-square-o"></i>
                    <span class="nav-text">Interventions Professeurs</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('interventions.create')}}">Cr&eacute;er</a></li>
                    <li><a href="{{route('interventions.index')}}">Liste</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">El&egrave;ves</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('eleves.create')}}">Ajouter un El&egrave;ve</a></li>
                    <li><a href="{{route('eleves.index')}}">Liste des El&egrave;ves</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Bulletin scolaire</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="#">Editer</a></li>
                    <!-- <li><a href="#">Liste</a></li> -->
                </ul>
            </li>
            @break;
            @case(3)
            <li>
                <a href="{{route('dashboard')}}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Espace Enseignant</span>
                </a>
            </li>
            {{-- <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Professeurs</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('prof.index')}}">Liste des Professeurs</a></li>
            <li><a href="{{route('prof.create')}}">Ajouter un Professeur</a></li>
        </ul>
        </li>--}}
        {{-- <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-users"></i>
                <span class="nav-text">El&egrave;ves</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{route('eleves.index')}}">Liste des El&egrave;ves</a></li>
        <li><a href="{{route('eleves.create')}}">Ajouter un El&egrave;ve</a>
        </li>
        </ul>--}}
        </li>
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-users"></i>
                <span class="nav-text">Evaluations</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{route('evaluations.create')}}">Ajouter</a></li>
                <li><a href="{{route('evaluations.index')}}">Liste</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-plus-square-o"></i>
                <span class="nav-text">Interventions</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{route('interventions.index')}}">Liste</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-book"></i>
                <span class="nav-text">Notes</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{route('notes.index')}}">Liste</a></li>
            </ul>
        </li>
        @break;
        @case(4)

        @break;
        @case(5)

        @break;
        @case(6)

        @break;
        @case(7)

        @break;
        @endswitch
        @endif



        <!-- <li class="nav-label">Table</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-table"></i>
                    <span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                    <li><a href="table-datatable-basic.html">Datatable</a></li>
                </ul>
            </li>
            <li class="nav-label">Extra</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-th-list"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./page-register.html">Register</a></li>
                    <li><a href="./page-login.html">Login</a></li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="./page-error-400.html">Error 400</a></li>
                            <li><a href="./page-error-403.html">Error 403</a></li>
                            <li><a href="./page-error-404.html">Error 404</a></li>
                            <li><a href="./page-error-500.html">Error 500</a></li>
                            <li><a href="./page-error-503.html">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="./page-lock-screen.html">Lock Screen</a></li>
                </ul>
            </li> -->
        </ul>
        <div class="copyright text-danger">
            &nbsp;&hearts;
        </div>
    </div>
</div>