@extends('layouts.app')
@section('title','Liste des professeurs')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Professeurs</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">professeurs</a></li>
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
            </ul>
        </div>
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="grid-view" class="tab-pane fade active show col-lg-12">
                    <div class="row">
                        @forelse($profs as $prof)
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
                                                    href="{{route('prof.edit',$prof->id)}}">Modifier</a>
                                                <!-- <a class="dropdown-item text-danger"
                                                    href="javascript:void(0);">Supprimer</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-2">
                                    <div class="text-center">
                                        <div class="profile-photo">
                                            <img src="{{asset('assets/images/avatar/4.jpg')}}" width="100"
                                                class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <h3 class="mt-4 mb-1">{{$prof->nom}}</h3>
                                        <p class="text-muted">{{$prof->prenoms}}</p>
                                        <ul class="list-group mb-3 list-group-flush">
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Genre :</span><strong>{{$prof->sexe}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">N&deg; de t&eacute;l&eacute;phone. :</span>
                                                <strong>{{$prof->telephone}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Email:</span><strong>{{$prof->email}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span
                                                    class="mb-0">Discipline:</span><strong>{{$prof->firstDiscipline->libelle}}</strong>
                                            </li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Inscrit(e) le:</span><strong>
                                                    {{$prof->created_at}}</strong>
                                            </li>

                                        </ul>
                                        <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="">Voir plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                    <!-- pagination grille -->
                    <div class="row" style="float:right;">
                        <nav class="nav text-right">{{$profs->links('pagination::bootstrap-4')}}</nav>
                    </div>
                    <!-- end pagination -->
                </div>
                <!-- list view -->
                <div id="list-view" class="tab-pane fade col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Professeur</h4>
                            <a href="" class="btn btn-primary">+ Ajouter</a>
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
                                            <th>T&eacute;l&eacute;phone</th>
                                            <th>Email</th>
                                            <th>Discipline</th>
                                            <th>Inscrit(e) le</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($profs as $prof)
                                        <tr>
                                            <td><img class="rounded-circle" width="35"
                                                    src="{{asset('assets/images/avatar/4.jpg')}}" alt=""></td>
                                            <td>{{$prof->nom}}</td>
                                            <td>{{$prof->prenoms}}</td>
                                            <td>{{$prof->sexe}}</td>
                                            <td>{{$prof->telephone}}</td>
                                            <td><a href="javascript:void(0);"><strong>{{$prof->email}}</strong></a></td>
                                            <td>
                                                <a
                                                    href="javascript:void(0);"><strong>{{$prof->firstDiscipline->libelle}}</strong></a>
                                            </td>
                                            <td>{{$prof->created_at}}</td>
                                            <td>
                                                <a href="{{route('prof.edit',$prof->id)}}"
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
                                    <nav class="nav text-right">{{$profs->links('pagination::bootstrap-4')}}</nav>
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