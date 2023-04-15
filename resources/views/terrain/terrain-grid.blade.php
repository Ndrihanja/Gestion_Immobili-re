@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Terrain</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('terrain/list') }}">Terrain</a></li>
                            <li class="breadcrumb-item active">Toutes les Terrains</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body pb-0">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Terrains</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('terrain/list') }}" class="btn btn-outline-gray me-2"><i class="feather-list"></i></a>
                                    <a href="{{ route('terrain/grid') }}" class="btn btn-outline-gray me-2 active"><i class="feather-grid "></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="student-pro-list">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 d-flex">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="student-box flex-fill">
                                                <div class="student-img">
                                                    <a href="agence-details.html">
                                                        <img class="img-fluid" alt="Students Info" src="{{ URL::to('assets/img/profile-user.jpg') }}">
                                                    </a>
                                                </div>
                                                <div class="student-content pb-0">
                                                    <h5><a href="student-details.html">Superficie : 4ha x 2ha</a></h5>
                                                    <h6>Terrain</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection