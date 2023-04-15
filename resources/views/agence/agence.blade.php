@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Agences</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('agence/list') }}">Agence</a></li>
                            <li class="breadcrumb-item active">Toutes les Agences</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="student-group-form">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Recherche par ID ...">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Recherche par Nom ...">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Recherche par Phone ...">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="btn" class="btn btn-primary">Recherche</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Agences</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('agence/list') }}" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
                                    <a href="{{ route('agence/grid') }}" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                                    <a href="{{ route('agence/pdf') }}" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Télecharger</a>
                                    <a href="{{ route('agence/add/page') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Province</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agenceList as $key=>$list )

                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </td>
                                        <td>STD{{ ++$key }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="agence-details.html">{{ $list->nom_agence }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $list->phone }}</td>
                                        <td>{{ $list->mail }}</td>
                                        <td>{{ $list->nom_province }}</td>
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="{{ url('agence/edit/'.$list->id) }}" class="btn btn-sm bg-danger-light">
                                                    <i class="feather-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm bg-success-light me-2 ">
                                                    <i class="feather-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection