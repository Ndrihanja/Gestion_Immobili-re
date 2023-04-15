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

                            <div>
                                <h2>ACTE DE VENTE DE L' APPARTEMENT NUMERO : 0FP12S {{$data->id}}</h2>
                                <p>Entre les soussignés :</p>

                                <p>Monsieur/Madame {{ Session::get('name') }}, demeurant à {{ Session::get('position') }},<br>
                                    Ci-après dénommé(e) "le vendeur",</p>

                                <p>Et</p>

                                <p>Monsieur/Madame {{ $data->client }}, demeurant à {{$data->adresse}},<br>
                                    Ci-après dénommé(e) "l'acheteur",</p>

                                <p>Il a été convenu ce qui suit :</p>

                                <p><strong>Article 1 : Objet de la vente</strong><br>
                                    Le vendeur cède à l'acheteur, qui accepte, un appartement situé {{$data->lot}},<br>
                                    désigné sous le numéro {{$data->id_logement}}, pour un prix de {{$data->prix}} Ariary.</p>

                                <p><strong>Article 2 : Paiement</strong><br>
                                    Le paiement de la somme mentionnée à l'article 1 est effectué le jour de la signature de l'acte de vente,<br>
                                    par chèque, virement bancaire ou tout autre moyen de paiement convenu entre les parties.</p>

                                <p><strong>Article 3 : Condition suspensive</strong><br>
                                    La vente est conclue sous condition suspensive de l'obtention par l'acheteur d'un prêt immobilier<br>
                                    d'un montant de {{$data->prix - 50000000}} Ariary au taux maximum de 20%, dans un délai de<br>
                                    20 jours à compter de la signature du présent acte.</p>

                                <p><strong>Article 4 : Transfert de propriété</strong><br>
                                    Le transfert de propriété de l'appartement se fera à compter du paiement intégral du prix de vente.</p>

                                <p><strong>Article 5 : Clause pénale</strong><br>
                                    En cas de non-respect des obligations contractuelles par l'une ou l'autre des parties, il est convenu une clause pénale de<br>
                                    40000000 Ariary.</p>

                                <p><strong>Article 6 : Frais</strong><br>
                                    Les frais de notaire et tous les frais liés à la vente sont à la charge de l'acheteur.</p>

                                <p><strong>Article 7 : Loi applicable</strong><br>
                                    Le présent acte est soumis à la loi Malagasy.</p>

                                <p>Fait à [Lieu de la signature], le [Date de la signature].</p>

                                <p>Le vendeur,<br>
                                    {{ Session::get('name') }}
                                </p>

                                <p>L'acheteur,<br>
                                    {{ $data->client }}
                                </p>

                                <p>Le Directeur,<br>

                            </div>


                            <div class="table-responsive">

                                <table class="table mb-0 ">
                                    <thead class="student-thread">
                                        <tr style="border: 1px solid #fafafa;">
                                            <th style="border-bottom: 1px solid black !important; padding: 1rem;">ID</th>
                                            <th style="border-bottom: 1px solid black !important; padding: 1rem;">Client</th>
                                            <th style="border-bottom: 1px solid black !important; padding: 1rem;">Logement</th>
                                            <th style="border-bottom: 1px solid black !important; padding: 1rem;">Prix</th>
                                            <th style="border-bottom: 1px solid black !important; padding: 1rem;">Date vente</th>
                                            <th style="border-bottom: 1px solid black !important; padding: 1rem;">Achat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="border-bottom: 1px solid black !important; padding: 1rem;">STD{{ $data->id }}</td>
                                            <td style="border-bottom: 1px solid black !important; padding: 1rem;">
                                                {{ $data->client }}
                                            </td>
                                            <td style="border-bottom: 1px solid black !important; padding: 1rem;">{{ $data->logement }}</td>
                                            <td style="border-bottom: 1px solid black !important; padding: 1rem;">{{ $data->prix }}</td>
                                            <td style="border-bottom: 1px solid black !important; padding: 1rem;">{{ $data->date }}</td>
                                            <td style="border-bottom: 1px solid black !important; padding: 1rem;">{{ $data->achat }}</td>
                                        </tr>

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