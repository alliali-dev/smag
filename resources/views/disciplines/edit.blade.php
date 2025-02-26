@extends('layouts.app')
@section('title','')
@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Nouveau Professeur</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">Professeurs</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Liste Professeurs</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulaire</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="post" id="addStaffForm">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="first_name">Nom</label>
                                    <input placeholder="" id="first_name" type="text" name="nom" class="form-control"
                                        required @if(old('nom')) value="{{old('nom')}}" @else value="{{$user->nom}}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="last_name">Pr&eacute;noms</label>
                                    <input placeholder="" id="last_name" type="text" class="form-control" required
                                        name="prenoms" @if(old('prenoms')) value="{{old('prenoms')}}" @else
                                        value="{{$user->prenoms}}" @endif>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="email_here">Email </label>
                                    <input placeholder="Email Here" id="email_here" type="email" class="form-control"
                                        required name="email" @if(old('email')) value="{{old('email')}}" @else
                                        value="{{$user->email}}" @endif>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="datepicker">Joining Date</label>
                                    <div class="input-hasicon mb-xl-0 mb-3">
                                        <input placeholder="Joining Date" name="datepicker"
                                            class="datepicker-default form-control" id="datepicker" required>
                                        <div class="icon"><i class="far fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group pass-group">
                                        <input placeholder="Password" id="password" type="password"
                                            class="form-control pass-input" required>
                                        <span class="input-group-text pass-handle">
                                            <i class="fa fa-eye-slash"></i>
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="confirm_password">Confirmer </label>
                                    <div class="input-group pass-group">
                                        <input placeholder="Confirm Password" id="confirm_password" type="password"
                                            class="form-control pass-input" required>
                                        <span class="input-group-text pass-handle">
                                            <i class="fa fa-eye-slash"></i>
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="mobile_number">T&eacute;l&eacute;phone</label>
                                    <input placeholder="Mobile Number" id="mobile_number" type="tel" maxlength="15"
                                        name="phone" class="form-control" required @if(old('phone'))
                                        value="{{old('phone')}}" @else value="{{$user->telephone}}" @endif>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Genre</label>
                                    <select class="form-control" name="sexe">
                                        <option value="{{$user->sexe}}" desabled>{{$user->sexe}}</option>
                                        <option value="Homme">Homme</option>
                                        <option value="Femme">Femme</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="designation">Designation</label>
                                    <input placeholder="Designation" id="designation" type="text" class="form-control"
                                        required>
                                </div>
                            </div> -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Discipline</label>
                                    <select class="form-control" name="discipline">
                                        <option desabled>Choisir la discipline</option>
                                        <option value="Anglais">Anglais</option>
                                        <option value="Histoire-Geographie">
                                            Histoire-Geographie</option>
                                        <option value="Français">
                                            Français
                                        </option>
                                        <option value="Espagnol">
                                            Espagnol</option>
                                        <option value="Allemand">
                                            Allemand
                                        </option>
                                        <option value="Science de la vie et de la terre">
                                            Science de la vie et de la terre
                                        </option>
                                        <option value="Philisophie">
                                            Philisophie</option>
                                        <option value="Physique-Chimie">
                                            Physique-Chimie
                                        </option>
                                        <option value="Mathématiques">
                                            Mathématiques</option>
                                        <option value="Chinois">
                                            Chinois</option>
                                        <option value="Grec">Grec</option>
                                        <option value="Education Physique et Sportive">Education Physique et Sportive
                                        </option>
                                        <option value="Musique">Musique</option>
                                        <option value="Arabe">Arabe</option>
                                        <option value="Arts Plastiques">Arts Plastiques</option>
                                        <option value="EDHC">EDHC</option>
                                        <option value="Conduite">Conduite</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group fallback w-100">
                                    <label class="form-label" for="avatar">Avatar</label>
                                    <input type="file" name="avatar" accept="images/" id="avatar" class="form-control"
                                        data-default-file="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Valider</button>
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger light">Reprendre</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop