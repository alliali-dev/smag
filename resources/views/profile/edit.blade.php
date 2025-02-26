@extends('layouts.app')
@section('title','Informations profile')
@section('content')

<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Param&egrave;tres</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="">Profile</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Modification</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Informations profile</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                    {{-- <div class="row">
                            <div class="col-12">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection