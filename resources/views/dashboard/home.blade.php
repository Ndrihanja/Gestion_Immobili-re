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
                            <li class="breadcrumb-item active">{{ Session::get('name') }}</li>
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
                                <h6>Vente(s)</h6>
                                <h3>{{$vente_count}}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/teacher-icon-01.svg" alt="Dashboard Icon">
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
                                <h6>Agence(s)</h6>
                                <h3>{{$agence_count}}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/dash-icon-02.svg" alt="Dashboard Icon">
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
                                <h6>Logement(s)</h6>
                                <h3>{{$logement_count}}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/dash-icon-03.svg" alt="Dashboard Icon">
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
                                <h6>Revenue</h6>
                                <h3>$ {{$total}}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/dash-icon-04.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6" style="background: white; border-radius:1rem; margin-bottom: 2rem; padding:1rem;">
                <canvas id="container_vente"></canvas>
            </div>

            <div class="col-md-12 col-lg-6">
                <div id="container_achat" style="height: 100%;"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">

                <div class="card flex-fill student-space comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title">Liste des Achats</h5>
                        <ul class="chart-list-out student-ellips">
                            <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table star-student table-hover table-center table-borderless table-striped datatable table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Prix</th>
                                        <th class="text-center">Date Achat</th>
                                        <th class="text-center">Client</th>
                                        <th class="text-end">Logement</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($achats_info as $key=>$list )

                                    <tr>

                                        <td>AC{{ ++$key }}</td>
                                        <td>{{ $list->prix_total }}</td>
                                        <td>{{ $list->date_achat }}</td>
                                        <td>{{ $list->nom_client }}</td>
                                        <td class="text-end">{{ $list->nom_logement }}</td>
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

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="{{ URL::to('assets/plugins/chartjs/chart.min.js') }}"></script>
    <script type="text/javascript">
        var userData = <?php echo json_encode($achats) ?>;
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

        Highcharts.chart('container_achat', {
            title: {
                text: 'Statistique des achats de TsaraVidy'
            },
            subtitle: {
                text: 'Tsaravidy statisttique'
            },
            xAxis: {
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ]
            },
            yAxis: {
                title: {
                    text: 'Nombres des ventes'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Nouvelles Achats',
                data: userData
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>

    @endsection