@extends('layouts.app')
@section('title','Liste des notes')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Notes</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Note</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">liste</a></li>
            </ol>
        </div>
    </div>
    @include('layouts.flash')
    <div class="row page-titles mx-0">
        <form action="{{route('notes.index')}}" method="get">
            @csrf
            <div class="row">
                <div class="col-3">
                    <label for="pp">Periode</label>
                    <select name="pp" id="pp" class="form-select">
                        @forelse ($periodes as $item)
                        <option value="{{$item->id}}">{{$item->libelle}}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
                <div class="col-3">
                    <label for="pc">Classe</label>
                    <select name="pc" id="pc" class="form-select">
                        @forelse ($classes as $item)
                        <option value="{{$item->idclas}}">{{$item->classe}}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
                <div class="col-4">
                    @if (!empty($disciplines))
                    <label for="pd">Discipline</label>
                    <select name="pd" id="pd" class="form-select">
                        @forelse($disciplines as $key=>$item)
                        <option value="{{$item->codeMat}}">{{$item->matiere}}</option>
                        @empty

                        @endforelse
                    </select>

                    @error('pd') <span class="text text-danger">{{$message}}</span>@enderror
                    @else
                    <!-- "Aucune discipline disponible!" -->
                    @endif
                </div>
                <div class="col-2" style="margin-top: 1%;">
                    <button type="submit" class="btn btn-primary" id="btnFilterEvalu">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                </div>
            </div>
        </form>
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
                            <h4 class="card-title">Liste des Notes du
                                {{-- @forelse ($evaluation as $item)
                                {{$item->moment}}
                                @empty
                                @endforelse --}}
                            </h4>
                            @switch(auth()->user()->role_id)

                            @case(1)
                            <a href="{{route('notes.create')}}" class="btn btn-primary" id="aj">+ Ajouter</a>
                            @break

                            @case(3)
                            <a href="{{route('notes.create')}}" class="btn btn-primary" id="aj">+ Ajouter</a>
                            @break
                            @endswitch

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="noteTable" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>P&eacute;riode</th>
                                            <th>&nbsp;</th>
                                            <th>Classe</th>
                                            <th>Discipline</th>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                        </tr>
                                        <tr>
                                            {{-- <th>Periode</th>
                                            <th>Classe</th> --}}
                                            <th>Nom & Pr&eacute;noms</th>
                                            <th>Disciplines</th>
                                            <th>Type de note</th>
                                            <th colspan="2">Notes</th>
                                            <th scope="col">Co&eacute;fficient</th>
                                            <th>Note&Cross;Cof</th>
                                            {{-- <th>Professeur</th> --}}
                                            {{-- <th>Est PP</th> --}}
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>


                                    </tbody>
                                </table>
                                <hr>
                                <div class="row" style="float:right;">
                                    <nav class="nav text-right" id="paginateNav">

                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="text-align: right;">
                            <button type="button" class="btn btn-primary" id="printButton">
                                <i class="fa-solid fa-print"></i>&nbsp;
                                Imprimer
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end list view -->
            </div>
        </div>
    </div>

</div>
@stop