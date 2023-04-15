@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Modification Logements</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('logement/add/page') }}">Logement</a></li>
                            <li class="breadcrumb-item active">Modification Logement</li>
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
                        <form action="{{ route('logement/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="id" value="{{ $logementEdit->id }}" readonly>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Logement Information
                                        <span>
                                            <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                        </span>
                                    </h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Lot <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('lot') is-invalid @enderror" name="lot" value="{{ $logementEdit->lot }}">
                                        @error('lot')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom Logement <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('nom_logement') is-invalid @enderror" name="nom_logement" value="{{ $logementEdit->nom_logement }}">
                                        @error('nom_logement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prix <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ $logementEdit->prix }}">
                                        @error('prix')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group students-up-files">
                                        <label>Upload Logement Photo (150px X 150px)</label>
                                        <div class="uplod">
                                            <h2 class="table-avatar">
                                                <a class="avatar avatar-sm me-2">
                                                    <img class="avatar-img rounded-circle" src="{{ Storage::url('logement-photos/'.$logementEdit->image) }}" alt="Logement Image">
                                                </a>
                                            </h2>
                                            <label class="file-upload image-upbtn mb-0 @error('image') is-invalid @enderror">
                                                Choose File <input type="file" name="image">
                                            </label>
                                            <input type="hidden" name="image_hidden" value="{{ $logementEdit->image }}">
                                            @error('upload')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Cité <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('cite_id') is-invalid @enderror" name="cite_id">
                                            <option selected disabled>Select Cité</option>
                                            @foreach ($cites as $cite)
                                            <option value="{{ $cite->id }}">{{ $cite->nom_cite }}</option>
                                            @endforeach
                                        </select>
                                        @error('cite_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Terrain <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('terrain_id') is-invalid @enderror" name="terrain_id">
                                            <option selected disabled>Select Terrain</option>
                                            @foreach ($terrains as $terrain)
                                            <option value="{{ $terrain->id }}">{{ $terrain->surface }}</option>
                                            @endforeach
                                        </select>
                                        @error('terrain_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Type <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('type_logement_id') is-invalid @enderror" name="type_logement_id">
                                            <option selected disabled>Select Type</option>
                                            @foreach ($Typelogements as $Typelogement)
                                            <option value="{{ $Typelogement->id }}">{{ $Typelogement->type }}</option>
                                            @endforeach
                                        </select>
                                        @error('type_logement_id')
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