<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>TsaraVidy Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


</head>

<body>

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col" style="padding: 1rem; text-align:center;">
                                        <h2 class="page-title">Listes des Agences</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0 ">
                                    <thead class="student-thread">
                                        <tr style="border: 1px solid #fafafa;">
                                            <th style="border-bottom: 1px solid black !important; padding: 1rem;">ID</th>
                                            <th style="border-bottom: 1px solid black !important; padding: 1rem;">Nom</th>
                                            <th style="border-bottom: 1px solid black !important; padding: 1rem;">Phone</th>
                                            <th style="border-bottom: 1px solid black !important; padding: 1rem;">Email</th>
                                            <th style="border-bottom: 1px solid black !important; padding: 1rem;">Province</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $key=>$list )

                                        <tr>
                                            <td style="border-bottom: 1px solid black !important; padding: 1rem;">STD{{ ++$key }}</td>
                                            <td style="border-bottom: 1px solid black !important; padding: 1rem;">
                                                {{ $list->nom_agence }}
                                            </td>
                                            <td style="border-bottom: 1px solid black !important; padding: 1rem;">{{ $list->phone }}</td>
                                            <td style="border-bottom: 1px solid black !important; padding: 1rem;">{{ $list->mail }}</td>
                                            <td style="border-bottom: 1px solid black !important; padding: 1rem;">{{ $list->province_id }}</td>
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


    <script src="{{ URL::to('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/script.js') }}"></script>
</body>

</html>