@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Cités</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('cite/list') }}">Cite</a></li>
                            <li class="breadcrumb-item active">Toutes les CItés</li>
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
                        <input type="text" class="form-control" placeholder="Recherche par Agence ...">
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
                                    <h3 class="page-title">Cités</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('cite/list') }}" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
                                    <a href="{{ route('cite/grid') }}" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                                    <a href="{{ route('cite/pdf') }}" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Télecharger</a>
                                    <a href="{{ route('cite/add/page') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                        <th>Agence</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($citeList as $key=>$list )

                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </td>
                                        <td class="cite_id">{{ $list->id }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="agence-details.html">{{ $list->nom_cite }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $list->nom_agence }}</td>
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="{{ url('cite/edit/'.$list->id) }}" class="btn btn-sm bg-danger-light">
                                                    <i class="feather-edit"></i>
                                                </a>
                                                <a class="btn btn-sm bg-success-light me-2 cite_delete" data-bs-toggle="modal" data-bs-target="#deleteCite">
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


{{-- model cite delete --}}
<div class="modal fade contentmodal" id="deleteCite" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content doctor-profile">
            <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x-circle"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cite/delete') }}" method="POST">
                    @csrf
                    <div class="delete-wrap text-center">
                        <div class="del-icon">
                            <i class="feather-x-circle"></i>
                        </div>
                        <input type="hidden" name="cite_id" class="e_cite_id" value="">
                        <h2>Voulez vous vraiment supprimer?</h2>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-success me-2">Oui</button>
                            <a class="btn btn-danger" data-bs-dismiss="modal">Non</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')

{{-- delete js --}}
<script>
    $(document).on('click', '.cite_delete', function() {
        var _this = $(this).parents('tr');
        $('.e_cite_id').val(_this.find('.cite_id').text());
    });
</script>
@endsection

@endsection