@extends('layouts.app')
@section('title','Liste des écoles')
@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>&Eacute;coles<span class="text text-danger" id="cmp">({{$ecoles->total()}})</span></h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">&Eacute;cole</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">liste</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <a href="#list-view" data-bs-toggle="tab" class="nav-link active show">Liste
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-lg-12">
            <div class="row tab-content">

                <!-- list view -->
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ecole</h4>
                            <a href="{{route('etablissements.create')}}" class="btn btn-primary">+ Ajouter</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Logo</th>
                                            <th>Nom</th>
                                            <th>Statut</th>
                                            <th>Code</th>
                                            <th>T&eacute;l&eacute;phone</th>
                                            <th>Adresse postale</th>
                                            <th>Email</th>
                                            <th>Ville</th>
                                            <th>Localisation</th>
                                            <th>Inscrit(e) le</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($ecoles as $ecol)
                                        <tr>
                                            <td><img class="rounded-circle" width="35"
                                                    src="{{asset('assets/images/logos/'.$ecol->logo)}}" alt="logo"></td>
                                            <td>{{$ecol->nom}}</td>
                                            <td>{{$ecol->statut}}</td>
                                            <td>{{$ecol->code}}</td>
                                            <td>{{$ecol->telephone}}</td>
                                            <td>{{$ecol->adresse_postale}}</td>
                                            <td><a href="javascript:void(0);"><strong>{{$ecol->email}}</strong></a>
                                            </td>
                                            <td>{{$ecol->ville}}</td>
                                            <td>{{$ecol->localisation}}</td>
                                            <td>{{$ecol->created_at}}</td>
                                            <td>
                                                <a href="{{route('etablissements.edit',$ecol->id)}}"
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
                                    <nav class="nav text-right">{{$ecoles->links('pagination::bootstrap-4')}}</nav>
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