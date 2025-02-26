@extends('layouts.app')
@section('title','Liste des Interventions')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Interventions<span class="text text-danger" id="cmp">({{$interventions->total()}})</span></h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Intervention professeurs</a></li>
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
                            <h4 class="card-title">Intervention</h4>
                            @switch(auth()->user()->role_id)

                            @case(1)
                            <a href="{{route('interventions.create')}}" class="btn btn-primary">+ Ajouter</a>
                            @break

                            @case(2)
                            <a href="{{route('interventions.create')}}" class="btn btn-primary">+ Ajouter</a>
                            @break
                            @endswitch

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Classe</th>
                                            <th>Professeur</th>
                                            <th>Est PP</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        @forelse($interventions as $item)
                                        <tr>
                                            <td>{{$item->classe}}</td>
                                            <td>{{$item->nomProf." ".$item->prenomsProf}}</td>
                                            <td>@if($item->pp==0){{"Non"}} @else {{"Oui"}}@endif</td>
                                            <td>
                                                @switch(auth()->user()->role_id)

                                                @case(1)
                                                <a href="{{route('interventions.edit',$item->id)}}"
                                                    class="btn btn-xs sharp btn-primary"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-xs sharp btn-danger"><i
                                                        class="fa fa-trash"></i></a>
                                                @break

                                                @case(2)
                                                <a href="{{route('interventions.edit',$item->id)}}"
                                                    class="btn btn-xs sharp btn-primary"><i
                                                        class="fa fa-pencil"></i></a>
                                                @break
                                                @endswitch
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
                                    <nav class="nav text-right">{{$interventions->links('pagination::bootstrap-4')}}
                                    </nav>
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