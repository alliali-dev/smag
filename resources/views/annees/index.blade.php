@extends('layouts.app')
@section('title','Liste des années')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Années<span class="text text-danger" id="cmp">({{$annees->total()}})</span></h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Années</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">liste</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <!-- list view -->
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Années</h4>
                            <a href="{{route('annees.create')}}" class="btn btn-primary">+ Ajouter</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Ann&eacute;e acad&eacute;mique</th>
                                            <th>D&eacute;but</th>
                                            <th>Fin</th>
                                            <th>Ajout&eacute;(e) le:</th>
                                            <th colspan="2">Actions</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        @forelse($annees as $item)
                                        <tr>
                                            <td>{{$item->libelle}}</td>
                                            <td>{{$item->debut_annee}}</td>
                                            <td>{{$item->fin_annee}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <a href="{{route('annees.edit',$item->id)}}"
                                                    class="btn btn-xs sharp btn-primary"><i
                                                        class="fa fa-pencil"></i></a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-xs sharp btn-danger"><i
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
                                    <nav class="nav text-right">{{$annees->links('pagination::bootstrap-4')}}</nav>
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