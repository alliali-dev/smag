@extends('layouts.app')
@section('title','Modification d\'un professeur')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Modification Professeur</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">Professeurs</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">modification</a></li>
            </ol>
        </div>
    </div>
    @include('layouts.flash')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire de modification</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('prof.update',$user->id)}}" method="post" id="EditProfForm"
                        enctype="multipart/form-data">
                        @method("PATCH")
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="first_name">Nom</label>
                                    <input placeholder="" id="first_name" type="text" name="nom"
                                        class="form-control @error('nom') is-invalid @enderror" required @if(old('nom'))
                                        value="{{old('nom')}}" @else value="{{$user->nom}}" @endif>
                                    @error('nom') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="last_name">Pr&eacute;noms</label>
                                    <input placeholder="" id="last_name" type="text"
                                        class="form-control @error('prenoms') is-invalid @enderror" required
                                        name="prenoms" @if(old('prenoms')) value="{{old('prenoms')}}" @else
                                        value="{{$user->prenoms}}" @endif>
                                    @error('prenoms') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="email_here">Email </label>
                                    <input placeholder="abcd@efg.xyz" id="email_here" type="email"
                                        class="form-control @error('email') is-invalid @enderror" required name="email"
                                        @if(old('email')) value="{{old('email')}}" @else value="{{$user->email}}"
                                        @endif>
                                    @error('email') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="mobile_number">T&eacute;l&eacute;phone</label>
                                    <input placeholder="Mobile Number" id="mobile_number" type="tel" maxlength="15"
                                        name="telephone" class="form-control" required @if(old('telephone'))
                                        value="{{old('telephone')}}" @else value="{{$user->telephone}}" @endif>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Genre</label>
                                    <select class="form-control @error('sexe') is-invalid @enderror" name="sexe">
                                        <option value="{{$user->sexe}}" desabled>{{$user->sexe}}</option>
                                        <option value="H">Homme</option>
                                        <option value="F">Femme</option>
                                    </select>
                                    @error('sexe') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Discipline</label>
                                    <select class="form-control @error('discip_princ') is-invalid @enderror"
                                        name="discip_princ" value="{{old('discip_princ')}}">
                                        <option desabled readonly value="0">Choisir la discipline</option>
                                        @forelse($diciplines as $item)
                                        <option value="{{$item->id}}">{{$item->libelle}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('discip_princ') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Discipline secondaire</label>
                                    <select class="form-control @error('discip_second') is-invalid @enderror"
                                        name="discip_second" value="{{old('discip_second')}}">
                                        <option desabled readonly value="0">Choisir la discipline secondaire</option>
                                        @forelse($diciplines as $item)
                                        <option value="{{$item->id}}">{{$item->libelle}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('discip_second') <span class="text text-danger">{{$message}}</span> @enderror
                                </div>
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