@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tableau de Bord</h1>

    <!-- Statistiques -->
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Visites Mensuelles</h5>
                    <p class="card-text">{{ $visitesMensuel }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Visites Annuelles</h5>
                    <p class="card-text">{{ $visitesAnnuel }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Appels Mensuels</h5>
                    <p class="card-text">{{ $appelsMensuel }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Appels Annuels</h5>
                    <p class="card-text">{{ $appelsAnnuel }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Avis Mensuels</h5>
                    <p class="card-text">{{ $avisMensuel }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Avis Annuels</h5>
                    <p class="card-text">{{ $avisAnnuel }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <h2>Visites par Mois</h2>
    <canvas id="visitesChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('visitesChart').getContext('2d');
    const visitesParMois = @json($visitesParMois);

    const labels = Object.keys(visitesParMois);
    const data = Object.values(visitesParMois);

    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Visites',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Mois'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Nombre de Visites'
                    }
                }
            }
        }
    });
</script>
@endsection
