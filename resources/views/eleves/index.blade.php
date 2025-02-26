@extends('layouts.app')
@section('title','Liste des élèves')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>&Eacute;lèves <span class="text text-danger" id="cmp">({{$eleves->total()}})</span></h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">élève</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">liste</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <a href="#grid-view" data-bs-toggle="tab" class="nav-link me-1 show active">Grille</a>
                </li>
                <li class="nav-item">
                    <a href="#list-view" data-bs-toggle="tab" class="nav-link">Liste
                    </a>
                </li>
                {{-- <form action="" method="post" enctype="multipart/form-data">
                    @csrf --}}
                {{-- --}}
                <li class="nav-item">
                    {{-- <a href="{{route('eleves.index')}}"> --}}
                    <select name="paramAn" id="paramAn" class="form-select">
                        <option value="" disabled selected>Filtrer</option>
                        <option value="2025-2026">2025-2026</option>
                        <option value="2024-2025">2024-2025</option>
                        <option value="2023-2024">2023-2024</option>
                    </select>
                    {{-- <button class="btn btn-primary" type="submit" id="btnFil">Filtrer</button> --}}
                    {{-- </a> --}}
                    {{-- </form> --}}
                </li>
            </ul>
        </div>
        <div class="col-lg-12">
            <div class="row tab-content">
                <!-- grid view -->
                <div id="grid-view" class="tab-pane fade active show col-lg-12">
                    <div class="row" id="grid-row">
                        @forelse($eleves as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="card card-profile">
                                <div class="card-header justify-content-end pb-0 border-0">
                                    <div class="dropdown">
                                        <button class="btn btn-link" type="button" data-bs-toggle="dropdown">
                                            <span class="dropdown-dots fs--1"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right border py-0">
                                            <div class="py-2">
                                                <a class="dropdown-item"
                                                    href="{{route('eleves.edit',$item->id)}}">Modifier</a>
                                                <!-- <a class="dropdown-item text-danger"
                                                    href="javascript:void(0);">Supprimer</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-2">
                                    <div class="text-center">
                                        <div class="profile-photo">
                                            <img src="{{asset('assets/images/eleves/'.$item->photo)}}" width="100"
                                                class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <h3 class="mt-4 mb-1">{{$item->nom}}</h3>
                                        <p class="text-muted">{{$item->prenoms}}</p>
                                        <ul class="list-group mb-3 list-group-flush">
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Genre :</span><strong>{{$item->sexe}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Date de naissance :</span>
                                                <strong>{{$item->date_nais}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Lieu de naissance :</span>
                                                <strong>{{$item->lieu_nais}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Nationalite:</span>
                                                <strong>{{$item->nationalite}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Matricule:</span>
                                                <strong>{{$item->matricule}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Redoublant:</span>
                                                <strong>{{$item->redoublant}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Regime:</span>
                                                <strong>{{$item->regime}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Affect&eacute;(e):</span>
                                                <strong>{{$item->affecte}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Ann&eacute;(e):</span>
                                                <strong>{{$item->annee}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Classe:</span>
                                                <strong>{{$item->classe}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Inscrit(e) le:</span><strong>
                                                    {{$item->created_at}}</strong>
                                            </li>

                                        </ul>
                                        {{-- <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="">Voir plus</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                    <!-- pagination grille -->
                    <div class="row" style="float:right;">
                        <nav class="nav text-right">{{$eleves->links('pagination::bootstrap-4')}}</nav>
                    </div>
                    <!-- end pagination -->
                </div>
                <!-- list view -->
                <div id="list-view" class="tab-pane fade col-lg-12" id="list-row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">El&Egrave;ve</h4>
                            <!-- <a href="" class="btn btn-primary">+ Ajouter</a> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Nom</th>
                                            <th>Pr&eacute;noms</th>
                                            <th>Genre</th>
                                            <th>Date de naissance</th>
                                            <th>Lieu de naissance</th>
                                            <!-- <th>T&eacute;l&eacute;phone</th> -->
                                            <th>Nationalite</th>
                                            <th>Matricule</th>
                                            <th>Redoublant</th>
                                            <th>Regime</th>
                                            <th>Affect&eacute;(e)</th>
                                            <th>Ann&eacute;e</th>
                                            <th>Classe</th>
                                            <th>Inscrit(e) le</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($eleves as $item)
                                        <tr>
                                            <td>
                                                <img class="rounded-circle" width="35"
                                                    src="{{asset('assets/images/eleves/'.$item->photo)}}" alt="">
                                            </td>
                                            <td>{{$item->nom}}</td>
                                            <td>{{$item->prenoms}}</td>
                                            <td>{{$item->sexe}}</td>
                                            <td>{{$item->date_nais}}</td>
                                            <td>{{$item->lieu_nais}}</td>
                                            <td>{{$item->nationalite}}</td>
                                            <td>{{$item->matricule}}</td>
                                            <td>{{$item->redoublant}}</td>
                                            <td>{{$item->regime}}</td>
                                            <td>{{$item->affecte}}</td>
                                            <td>{{$item->annee}}</td>
                                            <td>{{$item->classe}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <a href="{{route('eleves.edit',$item->id)}}"
                                                    class="btn btn-xs sharp btn-primary"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-xs sharp btn-danger"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                <hr>
                                <div class="row" style="float:right;">
                                    <nav class="nav text-right">{{$eleves->links('pagination::bootstrap-4')}}</nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end list view -->
            </div>
        </div>
    </div>

</div>
@stop