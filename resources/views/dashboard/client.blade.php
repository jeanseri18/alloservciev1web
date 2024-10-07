@extends('layouts.app')

@section('content')
<div class="container"><br>
    <h1>Tableau de bord</h1>

    <!-- Statistiques -->
    <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-primary shadow-sm"> <i class="bi bi-gear-fill"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Visites Mensuelles</span> <span class="info-box-number">
                                {{ $visitesMensuel }}                                        <small></small> </span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-primary shadow-sm"> <i class="bi bi-gear-fill"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Visites Annuelles</span> <span class="info-box-number">
                                {{ $visitesAnnuel }}
                                        <small></small> </span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div><div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-primary shadow-sm"> <i class="bi bi-gear-fill"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Appel mensuel</span> <span class="info-box-number">
                                {{ $appelsMensuel }}                                        <small></small> </span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div><div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-primary shadow-sm"> <i class="bi bi-gear-fill"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Appel annuel</span> <span class="info-box-number">
                                {{ $appelsAnnuel }}
                                        <small></small> </span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box"> <span class="info-box-icon text-bg-primary shadow-sm"> <i class="bi bi-gear-fill"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Avis Mensuels</span> <span class="info-box-number">
                                {{ $avisMensuel }}
                                        <small></small> </span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div><div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box"> <span class="info-box-icon text-bg-primary shadow-sm"> <i class="bi bi-gear-fill"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Avis annuel</span> <span class="info-box-number">
                                {{ $avisAnnuel }}
                                        <small></small> </span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div>
     
       
    </div>
    
    <!-- Chart.js -->
    <div class="row card container">
        <div class="col-md-12">
            <canvas id="visitesChart"></canvas>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('visitesChart').getContext('2d');
    const visitsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Visites par mois',
                data: @json($data),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
