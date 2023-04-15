@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome {{ Session::get('name') }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Agence</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Total Agences</h6>
                                <h3>{{ $agence_count}}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ URL::to('assets/img/icons/teacher-icon-01.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Total Province</h6>
                                <h3>{{$province_count}}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ URL::to('assets/img/icons/dash-icon-01.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Total Cités</h6>
                                <h3>{{$cite_count}}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ URL::to('assets/img/icons/teacher-icon-02.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Total Activité</h6>
                                <h3>{{$count_vente}}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ URL::to('assets/img/icons/teacher-icon-03.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 col-lg-12 col-xl-8">
                <div class="row">
                    <div class="col-12 col-lg-8 col-xl-8 d-flex">
                        <div class="card flex-fill comman-shadow">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title">Projet à Venir</h5>
                                    </div>
                                    <div class="col-6">
                                        <span class="float-end view-link"><a href="#">Voir toutes les projets</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-3 pb-3">
                                <div class="table-responsive lesson">
                                    <table class="table table-center">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="date">
                                                        <b>Tanamasoandro</b>
                                                        <p>Tana Ville</p>
                                                        <ul class="teacher-date-list">
                                                            <li><i class="fas fa-calendar-alt me-2"></i>Sep 5,
                                                                2023</li>
                                                            <li>|</li>
                                                            <li><i class="fas fa-clock me-2"></i>09:00 - 10:00
                                                                am</li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="lesson-confirm">
                                                        <a href="#">Confirmé</a>
                                                    </div>
                                                    <button type="submit" class="btn btn-info">Reprogrammer</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="date">
                                                        <b>Ankoay Tanana</b>
                                                        <p>Fianara Ville</p>
                                                        <ul class="teacher-date-list">
                                                            <li><i class="fas fa-calendar-alt me-2"></i>Aug 7,
                                                                20223</li>
                                                            <li>|</li>
                                                            <li><i class="fas fa-clock me-2"></i>09:00 - 10:00
                                                                am</li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="lesson-confirm">
                                                        <a href="#">Confirmé</a>
                                                    </div>
                                                    <button type="submit" class="btn btn-info">Reprogrammer</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4 d-flex">
                        <div class="card flex-fill comman-shadow">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h5 class="card-title">Progression de la semaine précédente</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="dash-widget">
                                <div class="circle-bar circle-bar1">
                                    <div class="circle-graph1" data-percent="{{$nombreAchats * 100/$count_vente}}">
                                        <div class="progress-less">
                                            <b>{{$nombreAchats}}/{{$count_vente}}</b>
                                            <p> Progression des ventes</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div style="background: white; border-radius:1rem; margin-bottom: 2rem; padding:1rem;">
                        <canvas id="container_vente"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-4 d-flex">
                <div class="card flex-fill comman-shadow">
                    <div class="card-body">
                        <div id="calendar-doctor" class="calendar-container"></div>
                        <div class="calendar-info calendar-info1">
                            <div class="up-come-header">
                                <h2>Nos ventes</h2>
                                <span><a href="javascript:;"><i class="feather-plus"></i></a></span>
                            </div>
                            <div class="upcome-event-date">
                                <h3>Toutes</h3>
                                <span><i class="fas fa-ellipsis-h"></i></span>
                            </div>
                            @foreach($ventes as $key=>$list)


                            <div class="calendar-details">
                                <p>{{$list->date}}</p>
                                <div class="calendar-box normal-bg">
                                    <div class="calandar-event-name">
                                        <h4>{{$list->logement}}</h4>
                                        <h5>{{$list->client}}</h5>
                                    </div>
                                    <span>{{$list->lot}}</span>
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

<script src="{{ URL::to('assets/plugins/chartjs/chart.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var datas = <?php echo json_encode($data) ?>;
        const ctx = document.getElementById('container_vente').getContext('2d');

        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: datas.label,
                datasets: [{
                    label: 'Achat de l\'année',
                    data: datas.datas,
                    backgroundColor: [
                        '#e1bee7',
                        '#ce93d8',
                        '#ba68c8',
                        '#ab47bc',
                        '#9c27b0',
                        '#8e24aa',
                        '#c5cae9',
                        '#9fa8da',
                        '#7986cb',
                        '#5c6bc0',
                        '#3f51b5',
                        '#3949ab',
                    ],
                    borderWidth: 1

                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        }
                    }]
                }
            }
        })
        console.log("Datas : ", datas);
    });
</script>
@endsection