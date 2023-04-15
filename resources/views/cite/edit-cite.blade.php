@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Modification Cités</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('cite/add/page') }}">Cité</a></li>
                            <li class="breadcrumb-item active">Modification Cité</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="{{ route('cite/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="id" value="{{ $citeEdit->id }}" readonly>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Cite Information
                                        <span>
                                            <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                        </span>
                                    </h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom cité <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('nom_cite') is-invalid @enderror" name="nom_cite" value="{{ $citeEdit->nom_cite }}">
                                        @error('nom_cite')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Agences <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('agence_id') is-invalid @enderror" name="agence_id">
                                            <option selected disabled>Select Agence</option>
                                            @foreach ($agences as $agence)
                                            <option value="{{ $agence->id }}">{{ $agence->nom_agence }}</option>
                                            @endforeach
                                        </select>
                                        @error('agence_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection