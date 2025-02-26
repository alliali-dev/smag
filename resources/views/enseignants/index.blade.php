@extends('layouts.app')
@section('title','Liste des professeurs')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Professeurs<span class="text text-danger" id="cmp">({{$profs->total()}})</span></h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">professeurs</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">liste</a></li>
            </ol>
        </div>
    </div>
    @include('layouts.flash')
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
                                            <th>Discipline(s)</th>
                                            <th>Inscrit(e) le</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        @forelse($profs as $prof)
                                        <tr>
                                            <td><img class="rounded-circle" width="35"
                                                    src="{{asset('assets/images/avatar/'.$prof->profile_photo_path)}}"
                                                    alt=""></td>
                                            <td>{{$prof->nom}}</td>
                                            <td>{{$prof->prenoms}}</td>
                                            <td>{{$prof->sexe}}</td>
                                            <td>{{$prof->telephone}}</td>
                                            <td><a href="javascript:void(0);"><strong>{{$prof->email}}</strong></a></td>
                                            <td>
                                                <a href="javascript:void(0);">
                                                    <strong>
                                                        @if($prof->discipline_id)
                                                        @forelse ($prof->discipline($prof->discipline_id) as $item)
                                                        {{$item->matiere}}<br>
                                                        @empty
                                                        @endforelse
                                                        @endif
                                                    </strong>
                                                </a>
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
                                        <tr>
                                            <td>&nbsp;</td>
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