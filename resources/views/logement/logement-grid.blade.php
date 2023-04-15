@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Logements</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('logement/list') }}">Logement</a></li>
                            <li class="breadcrumb-item active">Toutes les logements</li>
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
                                    <h3 class="page-title">Logement</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('logement/list') }}" class="btn btn-outline-gray me-2"><i class="feather-list"></i></a>
                                    <a href="{{ route('logement/grid') }}" class="btn btn-outline-gray me-2 active"><i class="feather-grid "></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="student-pro-list">
                            <div class="row">
                                @foreach($logementList as $key=>$list)
                                <div class="col-xl-3 col-lg-4 col-md-6 d-flex">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="student-box flex-fill">
                                                <div class="student-img">
                                                    <a href="agence-details.html">
                                                        <img class="img-fluid" src="{{ Storage::url('logement-photos/'.$list->image) }}" alt="Logement Image">
                                                    </a>
                                                </div>
                                                <div class="student-content pb-0">
                                                    <h5><a href="student-details.html">{{$list->logement}}</a></h5>
                                                    <h6>{{$list->lot}}</h6>
                                                    <p>{{$list->prix}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection