@extends('layouts.app')
@section('title','Liste des evaluations')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>&Eacute;valuations</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">&eacute;valuation</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">liste</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12" id="showMessage">
            @include('layouts.flash')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <a href="#list-view" data-bs-toggle="tab" class="nav-link active show">Liste
                    </a>
                </li>&nbsp;&nbsp;
                <form action="{{route('evaluations.index')}}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <select name="paramClasse" id="paramClasse" class="form-select">
                                @forelse ($classes as $item)
                                <option value="{{$item->idclas}}">{{$item->classe}}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>

                        <div class="col-6">
                            <div class="col-12">
                                <div class="form-group">
                                    @if (!empty($disciplines))
                                    <!--<label for="paramDiscipline">Discipline</label>-->
                                    <select name="paramDiscipline" id="paramDiscipline" class="form-select">
                                        @forelse($disciplines as $key=>$item)
                                        <option value="{{$item->codeMat}}">{{$item->matiere}}</option>
                                        @empty

                                        @endforelse
                                    </select>

                                    @error('paramDiscipline') <span
                                        class="text text-danger">{{$message}}</span>@enderror
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary" id="btnFilterEvalu"><i
                                    class="mdi mdi-magnify"></i></button>
                        </div>
                    </div>

                </form>
                <li class="nav-item"><a href="{{route('evaluations.index')}}" class="nav-link">Afficher tout
                        &circlearrowleft;</a> </li>
            </ul>
        </div>
        <div class="col-lg-12">
            <div class="row tab-content">
                <!-- list view -->
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">&eacute;valuation</h4>
                            @switch(auth()->user()->role_id)

                            @case(1)
                            <a href="{{route('evaluations.create')}}" class="btn btn-primary">+ Ajouter</a>
                            @break

                            @case(3)
                            <a href="{{route('evaluations.create')}}" class="btn btn-primary">+ Ajouter</a>
                            @break
                            @endswitch

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Periode</th>
                                            <th>Classe</th>
                                            <th>Discipline</th>
                                            <th>Type d'&eacute;valuation</th>
                                            <th scope="col">Co&eacute;fficient</th>
                                            {{-- <th>Professeur</th> --}}
                                            {{-- <th>Est PP</th> --}}
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        @forelse($evaluations as $item)
                                        <tr>
                                        </tr>
                                        <tr>
                                            <td>{{$item->periode}}</td>
                                            <td>{{$item->classe}}</td>
                                            <td>{{$item->matiere}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->coef}}</td>
                                            {{-- <td>{{$item->nomProf." ".$item->prenomsProf}}</td> --}}
                                            {{-- <td>@if($item->pp==0){{"Non"}} @else {{"Oui"}}@endif</td> --}}
                                            {{-- <td>
                                                @switch(auth()->user()->role_id)

                                                @case(1)
                                                <a href="{{route('evaluations.edit',$item->codeEval)}}"
                                            class="btn btn-xs sharp btn-primary"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-xs sharp btn-danger"><i
                                                    class="fa fa-trash"></i></a>
                                            @break

                                            @case(3)
                                            <a href="{{route('evaluations.edit',$item->codeEval)}}"
                                                class="btn btn-xs sharp btn-primary"><i class="fa fa-pencil"></i></a>
                                            @break
                                            @endswitch
                                            </td> --}}
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
                                    <nav class="nav text-right">{{$evaluations->links('pagination::bootstrap-4')}}
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