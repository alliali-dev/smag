@extends('layouts.app')
@section('title','Ajouter une évaluation')
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

                <li class="breadcrumb-item"><a href="">&Eacute;valuations</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter une &eacute;valuation</a></li>
            </ol>
        </div>
    </div>
    @include('layouts.flash')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire d&aacute;insertion d&aacute;une &eacute;valuation</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('evaluations.store')}}" method="post" id="addIntervForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Ann&eacute;e acade&eacute;mique</label>
                                    <select class="form-control @error('annee') is-invalid @enderror" name="annee"
                                        value="{{old('annee')}}" id="yearToPeriod" autofocus>
                                        <option desabled readonly value="0">Choisir l'ann&eacute;e</option>
                                        @forelse($annees as $item)
                                        <option value="{{$item->id}}">{{$item->libelle}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('annee') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Periode</label>
                                    <select class="form-control @error('periode') is-invalid @enderror" name="periode"
                                        value="{{old('periode')}}" id="periodeFromYear">
                                        <option desabled readonly value="0">Choisir la periode</option>
                                    </select>
                                    @error('periode') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="libNiveau">Libell&eacute; du niveau</label>
                                    <select name="libelle" id="libNiveau" value="{{old('libNiveau')}}"
                                        class="form-control @error('libNiveau') is-invalid @enderror">
                                        <option value="" selected>Choisissez le libellé du niveau</option>
                                        {{--@forelse($niveaus as $item)
                                        <option value="{{$item->id}}">{{$item->libelle}}</option>
                                        @empty
                                        @endforelse--}}
                                    </select>
                                    @error('libNiveau') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="divSerie">
                                    <label class="form-label" for="serie">S&eacute;rie</label>
                                    <select id="serie" name="serie"
                                        class="form-control @error('serie') is-invalid @enderror" required
                                        value="{{old('serie')}}">
                                    </select>
                                    @error('serie') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="classe">Classe</label>
                                    <select class="form-control @error('classse') is-invalid @enderror" name="classse"
                                        value="{{old('classse')}}" id="classe">
                                        <option desabled readonly value="0">Choisir la classe</option>
                                        @forelse($classes as $item)
                                        <option value="{{$item->idclas}}">{{$item->classe}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('classse') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="eleve">&Eacute;l&egrave;ve</label>
                                    <select class="form-control @error('eleve') is-invalid @enderror" name="eleve"
                                        value="{{old('eleve')}}" id="eleve">
                                        <option desabled readonly value="0">Choisir l'&eacute;l&egrave;ve</option>
                                        @forelse($eleves as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->matricule." | ". $item->nom." ".$item->prenoms}}
                                        </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('eleve') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Discipline</label>
                                    <br>
                                    <label for="dp">
                                        @forelse($disciplines as $item)
                                        {{$item->libelle}}
                                        <input type="radio" class="form-radio @error('discipline') is-invalid @enderror"
                                            name="discipline" id="dp" value="{{$item->id}}" checked>
                                        @empty
                                        @endforelse
                                    </label>
                                    &nbsp;&nbsp;&nbsp;
                                    <label for="ds">
                                        @forelse($discipsecond as $item)
                                        {{$item->libelle}}
                                        <input type="radio" class="form-radio @error('discipline') is-invalid @enderror"
                                            name="discipline" id="ds" value="1">
                                        @empty
                                        @endforelse
                                    </label>
                                    @error('discipline') <span class="text text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6  col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="coef_disc">Co&eacute;fficient de la
                                        discipline</label>
                                    <input type="number" min="1" max="8" size="1"
                                        class="form-control @error('coef_disc') is-invalid @enderror" name="coef_disc"
                                        value="{{old('coef_disc')}}">
                                    @error('coef_disc') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6  col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="type">Type</label>
                                    <select class="form-control @error('type') is-invalid @enderror" name="type"
                                        value="{{old('type')}}">
                                        <option value="Interrogation">Interrogation</option>
                                        <option value="Devoir de classe">Devoir de classe</option>
                                        <option value="Devoir de niveau">Devoir de niveau</option>
                                        <option value="Examen blanc">Examen blanc</option>
                                    </select>
                                    @error('type') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6  col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="coef">Co&eacute;fficient
                                        l&acute;&eacute;valuation</label>
                                    <input type="number" min="1" max="8" size="1"
                                        class="form-control @error('coef') is-invalid @enderror" name="coef"
                                        value="{{old('coef')}}" id="coef">
                                    @error('coef') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6  col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="note">Note
                                        l&acute;&eacute;valuation</label>
                                    <input type="text" class="form-control @error('note') is-invalid @enderror"
                                        name="note" value="{{old('note')}}" id="note">
                                    @error('note') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6  col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="prof">Professeur</label>
                                    <select class="form-control @error('prof') is-invalid @enderror" name="prof"
                                        value="{{old('prof')}}" id="prof">
                                        <option desabled readonly value="0">Choisir le Professeur</option>
                                        @forelse($profs as $item)
                                        <option value="{{$item->id}}" selected>{{$item->nom." ".$item->prenoms}}
                                        </option>
                                        @empty
                                        @endforelse
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