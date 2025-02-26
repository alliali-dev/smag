@extends('layouts.app')
@section('title','Modification d\'une évaluation')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Modification &Eacute;valuation</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">&Eacute;valuation</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">modification</a></li>
            </ol>
        </div>
    </div>
    @include('layouts.flash')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire de modification d&acute;une &eacute;valuation</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('evaluations.update',$evaluation->id)}}" method="post" id="EditEvalForm"
                        enctype="multipart/form-data">
                        @method("PATCH")
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Periode</label>
                                    <select class="form-select @error('periode') is-invalid @enderror" name="periode"
                                        value="{{old('periode')}}" id="periodeFromYear" readonly>
                                        <option disabled>Choisir la periode</option>
                                        <option value="{{$evaluation->periodeForEvaluation->id}}" selected>
                                            {{$evaluation->periodeForEvaluation->libelle}}
                                        </option>
                                    </select>
                                    @error('periode') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="classe">Classe</label>
                                    <select class="form-select @error('classe') is-invalid @enderror" name="classe"
                                        value="{{old('classe')}}" id="classe" readonly>
                                        @forelse ($evaluation->eleveForEvaluation->classeForEleve as $classe)
                                        <option value="{{$classe->id}}" selected>{{$classe->libelle}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('classe') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="eleve">&Eacute;l&egrave;ve</label>
                                    <select class="form-select @error('eleve') is-invalid @enderror" name="eleve"
                                        value="{{old('eleve')}}" id="eleve" readonly>
                                        <option disabled>Choisir l'&eacute;l&egrave;ve</option>
                                        <option value="{{$evaluation->eleveForEvaluation->id}}" selected>
                                            {{$evaluation->eleveForEvaluation->nom." ".$evaluation->eleveForEvaluation->prenoms}}
                                        </option>
                                    </select>
                                    @error('eleve') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-4 col-md-4">
                                <label class="form-label">Discipline</label>
                                <div class="form-group">
                                    <input type="radio" class="form-radio @error('discipline') is-invalid @enderror"
                                        name="discipline" id="dp" value="{{$evaluation->disciplineEvaluation->id}}"
                                        @if($evaluation->discipline_id==$evaluation->disciplineEvaluation->id)
                                    @checked(true)
                                    @endif
                                    readonly >
                                    <label for="dp">{{$evaluation->disciplineEvaluation->libelle}}</label>
                                </div>
                            </div>
                            <div class="col-sm-6  col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="coef_disc">Co&eacute;fficient de la
                                        discipline</label>
                                    <input type="number" min="1" max="8" size="1"
                                        class="form-control @error('coef_disc') is-invalid @enderror" name="coef_disc"
                                        @if(old('coef_disc')) value="{{old('coef_disc')}}" @else
                                        value="{{$evaluation->coef_disc}}" @endif id="coef_disc" placeholder="1"
                                        readonly>
                                    @error('coef_disc') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="typEv">Type</label>
                                    <select class="form-select @error('typEv') is-invalid @enderror" name="typEv"
                                        @if(old('typEv')) value="{{old('typEv')}}" @else value="{{$evaluation->type}}"
                                        @selected(true) @endif id="typEv">
                                        <option disabled selected>Choisir le type
                                            d&acute;&eacute;valuation
                                        </option>
                                        <option value="Interrogation" @if ($evaluation->type=="Interrogation")
                                            @selected(true)
                                            @endif>Interrogation</option>
                                        <option value="Devoir de classe" @if ($evaluation->type=="Devoir de classe")
                                            @selected(true)
                                            @endif>Devoir de classe</option>
                                        <option value="Devoir de niveau" @if ($evaluation->type=="Devoir de niveau")
                                            @selected(true)
                                            @endif>Devoir de niveau</option>
                                        <option value="Examen blanc" @if ($evaluation->type=="Examen blanc")
                                            @selected(true)
                                            @endif>Examen blanc</option>
                                    </select>
                                    @error('typEv') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6  col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="coef">Co&eacute;fficient de
                                        l&acute;&eacute;valuation</label>
                                    <input type="number" min="1" max="8" size="1" placeholder="1"
                                        class="form-control @error('coef') is-invalid @enderror" name="coef"
                                        @if(old('coef')) value="{{old('coef')}}" @else value="{{$evaluation->coef}}"
                                        @selected(true) @endif id="coef">
                                    @error('coef') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6  col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="note">Note de
                                        l&acute;&eacute;valuation</label>
                                    <input type="text" class="form-control @error('note') is-invalid @enderror"
                                        name="note" @if(old('note')) value="{{old('note')}}" @else
                                        value="{{$evaluation->note}}" @endif id="note" placeholder="16.50">
                                    @error('note') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6  col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="prof">Professeur</label>
                                    <select class="form-control @error('prof') is-invalid @enderror" name="prof"
                                        value="{{old('prof')}}" id="prof" readonly>
                                        <option disabled>Choisir le Professeur</option>
                                        <option value="{{$evaluation->profForEvaluation->id}}" selected>
                                            {{$evaluation->profForEvaluation->nom." ".$evaluation->profForEvaluation->prenoms}}
                                        </option>
                                    </select>
                                    @error('prof') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 d-right">
                                <button type="reset" class="btn btn-danger light">Reprendre</button>
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop