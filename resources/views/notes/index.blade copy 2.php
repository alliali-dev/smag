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
    {{-- <div class="row page-titles mx-0">
        <form action="{{route('notes.index')}}" method="get">
    @csrf
    <div class="row">
        <div class="col-3">
            <label for="paramPeriode">Periode</label>
            <select name="paramPeriode" id="paramPeriode" class="form-select">
                @forelse ($classes as $item)
                <option value="{{$item->idclas}}">{{$item->classe}}</option>
                @empty

                @endforelse
            </select>
        </div>
        <div class="col-3">
            <label for="paramClasse">Classe</label>
            <select name="paramClasse" id="paramClasse" class="form-select">
                @forelse ($classes as $item)
                <option value="{{$item->idclas}}">{{$item->classe}}</option>
                @empty

                @endforelse
            </select>
        </div>
        <div class="col-4">
            @if (!empty($disciplines))
            <label for="paramDiscipline">Discipline</label>
            <select name="paramDiscipline" id="paramDiscipline" class="form-select">
                @forelse($disciplines as $key=>$item)
                <option value="{{$item->codeMat}}">{{$item->matiere}}</option>
                @empty

                @endforelse
            </select>
            {{-- <input type="radio" class="form-radio @error('paramDiscipline') is-invalid @enderror"
                        name="paramDiscipline" id="{{$item->matiere.$key+1}}" value="{{$item->codeMat}}" checked
            data-name="{{$item->matiere.$key+1}}">
            <label for="{{$item->matiere.$key+1}}">{{$item->matiere}}</label>&nbsp;&nbsp; --}
            @error('paramDiscipline') <span class="text text-danger">{{$message}}</span>@enderror
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
</div> --}}
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
                        <h4 class="card-title">Note</h4>
                        @switch(auth()->user()->role_id)

                        @case(1)
                        <a href="{{route('notes.create')}}" class="btn btn-primary">+ Ajouter</a>
                        @break

                        @case(3)
                        <a href="{{route('notes.create')}}" class="btn btn-primary">+ Ajouter</a>
                        @break
                        @endswitch

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="noteTable" class="display text-nowrap" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Periode</th>
                                        <th>Classe</th>
                                        <th>El&egrave;ves</th>
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
                                    {{-- @dd($eleves) --}}
                                    @forelse($eleves as $k=>$item)
                                    <tr>
                                        <td rowspan="7" class="text-center">{{$item->moment}}</td>
                                        <td rowspan="7" class="text-center">{{$item->classe}}</td>
                                        <th rowspan="7" class="text-center">
                                            {{$item->firstname." ".$item->lastname}}
                                        </th>
                                        <td rowspan="7" class="text-center">{{$item->matiere}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    @if ($item->note)
                                    {{-- @dd($item->note) --}}

                                    @forelse ($item->note as $key=> $not)
                                    <tr>
                                        <td>{{$not->typeEval}}</td>
                                        {{-- <th>{{'Note'.$key+1}}</th> --}}
                                        <td></td>
                                        <td>
                                            {{ $item->note[$key]["valNote"]}}
                                            {{-- {{$not->valNote}} --}}
                                        </td>
                                        <td>{{$not->CoefEval}}</td>
                                        <td class="notecoef">{{$not->valNote*$not->CoefEval}}</td>
                                        <td>
                                            @switch(auth()->user()->role_id)

                                            @case(1)

                                            <a href="{{route('notes.edit',$not->CodeNote)}}"
                                                class="btn btn-xs sharp btn-primary"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-xs sharp btn-danger"><i
                                                    class="fa fa-trash"></i></a>
                                            @break

                                            @case(3)
                                            <a href="{{route('notes.edit',$not->CodeNote)}}"
                                                class="btn btn-xs sharp btn-primary"><i class="fa fa-pencil"></i></a>
                                            @break
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    @empty
                                    @endforelse
                                    @else
                                    @endif
                                    <tr>
                                        <th>Total</th>
                                        <td></td>
                                        <td class="text text-danger" id="{{'nbrNote'.$k+1}}">
                                            <strong>
                                                <input type="text" class="text text-danger text-center"
                                                    name="{{'nbrNote'.$k+1}}" id="{{'nbrNote'.$k+1}}"
                                                    value="{{$item->note->count()}}" readonly
                                                    style="border: 0cm; cursor:none;">
                                            </strong>
                                        </td>
                                        @for ($i = 1; $i < $eleves->count(); $i++)
                                            <td>
                                                {{$i}}
                                                {{-- {{$item->note[$i-1]["CoefEval"]+$item->note[$i]["CoefEval"]}} --}}
                                            </td>
                                            @endfor
                                            <td class="{{'totalnotecoef'.$i}}"></td>
                                    </tr>
                                    <tr style="border-bottom: solid gray 1px;">
                                        <th>Moyenne(/20):</th>
                                        <td id="moy" colspan="7" class="text-end"
                                            style="font-size: 0.5cm; color:brown;">
                                            {{'moy'}}
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            <hr>
                            <div class="row" style="float:right;">
                                <nav class="nav text-right">{{$eleves->links('pagination::bootstrap-5')}}
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