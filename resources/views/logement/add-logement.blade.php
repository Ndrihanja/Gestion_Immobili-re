@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Ajout Logement</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('logement/add/page') }}">Logement</a></li>
                            <li class="breadcrumb-item active">Ajouter Logement</li>
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
                        <form action="{{ route('logement/add/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Logement Information
                                        <span>
                                            <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                        </span>
                                    </h5>
                                </div>
                                <div class="col-16 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Lot <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('lot') is-invalid @enderror" name="lot" placeholder="Entrez le lot du logement..." value="{{ old('lot') }}">
                                        @error('lot')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-16 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('nom_logement') is-invalid @enderror" name="nom_logement" placeholder="Entrez le nom du logement..." value="{{ old('nom_logement') }}">
                                        @error('nom_logement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Image <span class="login-danger">*</span></label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-16 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prix <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('prix') is-invalid @enderror" name="prix" placeholder="Entrez le prix du logement..." value="{{ old('prix') }}">
                                        @error('prix')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Cité <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('cite_id') is-invalid @enderror" id="cite_id" name="cite_id">
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
                                        <select class="form-control select  @error('terrain_id') is-invalid @enderror" id="terrain_id" name="terrain_id">
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
                                        <label>Type Logement <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('type_logement_id') is-invalid @enderror" id="type_logement_id" name="type_logement_id">
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