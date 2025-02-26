@extends('layouts.app')
@section('title','Ajouter une note')
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

                <li class="breadcrumb-item"><a href="">Notes</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter une note</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12" id="showMessage">
            @include('layouts.flash')
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire d&acute;insertion d&acute;une &eacute;valuation</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('notes.store')}}" method="post" id="addNoteForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="Evaluation">Evaluation</label>
                                    <select class="form-select @error('Evaluation') is-invalid @enderror"
                                        name="Evaluation" value="{{old('Evaluation')}}" id="Evaluation">
                                        <option disabled selected>Choisir l&acute;&eacute;valuation
                                        </option>
                                        @forelse ($evaluation as $item)
                                        <option value="{{$item->id}}" selected>{{$item->type}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                    @error('Evaluation') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="eleve">&Eacute;l&egrave;ve</label>
                                    <select class="form-select @error('eleve') is-invalid @enderror" name="eleve"
                                        value="{{old('eleve')}}" id="eleve">
                                        <option disabled selected>Choisir l'&eacute;l&egrave;ve</option>
                                        @forelse ($eleves as $item)
                                        <option value="{{$item->IdEleve}}" @if(old('eleve')==$item->IdEleve)
                                            {{'selected'}} @endif>
                                            {{
                                            $item->code." |".
                                            $item->firstname." ".
                                            $item->lastname
                                            }}
                                        </option>
                                        @empty

                                        @endforelse
                                    </select>
                                    @error('eleve') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-3  col-lg-3 col-md-3">
                                <div class="form-group position-relative">
                                    <label class="form-label" for="note">Note de
                                        l&acute;&eacute;valuation</label>
                                    <input type="text" class="form-control @error('note') is-invalid @enderror"
                                        name="note" value="{{old('note')}}" id="note" placeholder="16.50">
                                    <span class="inline-input">
                                        <i class="fa fa-times text-white"
                                            style="background-color: red; border-radius:10px;"></i>
                                    </span>
                                    @error('note') <span class="text text-danger">{{$message}}</span> @enderror
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