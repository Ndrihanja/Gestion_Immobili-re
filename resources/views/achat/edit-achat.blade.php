@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Ajout Vente</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('vente/add/page') }}">Vente</a></li>
                            <li class="breadcrumb-item active">Ajouter Ventes</li>
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
                        <form action="{{ route('vente/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Vente Information
                                        <span>
                                            <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                        </span>
                                    </h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Logement <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('logement_id') is-invalid @enderror" id="logement_id" name="logement_id">
                                            <option selected disabled>Select Logement</option>
                                            @foreach ($logement as $loge)
                                            <option value="{{ $loge->id }}">{{ $loge->nom_logement }}</option>
                                            @endforeach
                                        </select>
                                        @error('logement_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Client <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('client_id') is-invalid @enderror" id="client_id" name="client_id">
                                            <option selected disabled>Select Client</option>
                                            @foreach ($client as $cli)
                                            <option value="{{ $cli->id }}">{{ $cli->nom_Client }}</option>
                                            @endforeach
                                        </select>
                                        @error('client_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Type Achat <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('type_achat_id') is-invalid @enderror" id="type_achat_id" name="type_achat_id">
                                            <option selected disabled>Select Type achat</option>
                                            @foreach ($type_achat as $type)
                                            <option value="{{ $type->id }}">{{ $type->achat }}</option>
                                            @endforeach
                                        </select>
                                        @error('type_achat_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prix </label>
                                        <input class="form-control @error('prix_total') is-invalid @enderror" type="text" name="prix_total" value="{{ $venteEdit->prix_total }}">
                                        @error('prix_total')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Date <span class="login-danger">*</span></label>
                                        <input class="form-control @error('date_achat') is-invalid @enderror" type="date" name="date_achat" value="{{ old('date_achat') }}">
                                        @error('date_achat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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