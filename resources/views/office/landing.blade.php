@extends('layouts.client')
@section('contenu')
{{-- message --}}
{!! Toastr::message() !!}


<div class="page-wrapper">
    <div class="carou">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="height: 90vh;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="height: 100%;">
                <div class="carousel-item active">
                    <img src="/images/hero_bg_1.jpg" class="d-block w-100 img-fluid" style="object-fit: cover !important;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/hero_bg_2.jpg" class="d-block w-100 img-fluid" style="object-fit: cover;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/hero_bg_3.jpg" class="d-block w-100 img-fluid" style="object-fit: cover;" alt="...">
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-9 text-center">
                        <h2 class="heading" data-aos="fade-up">
                            Rendre vos rêves des réalités avec TsaraVidy et ses Logements
                        </h2>
                        <form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
                            <input type="text" class="form-control px-4" placeholder="Your ZIP code or City. e.g. New York" />
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


@endsection