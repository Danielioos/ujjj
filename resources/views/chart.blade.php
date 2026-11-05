@extends('layouts.app')

@section('title', 'Diagram – ReNew Kft.')

@section('content')
<div class="container my-4">
    <h1>Notebook statisztikák</h1>
    <p class="text-muted">A diagramok a notebook adatbázis aktuális adataiból készülnek.</p>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="content-card">
                <h4>Notebookok gyártónként</h4>
                <canvas id="brandChart"></canvas>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="content-card">
                <h4>Operációs rendszerek</h4>
                <canvas id="osChart"></canvas>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="content-card">
                <h4>Árkategóriák</h4>
                <canvas id="priceChart"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    new Chart(document.getElementById('brandChart'), {
        type: 'bar',
        data: {
            labels: @json($brands->pluck('gyarto')),
            datasets: [{
                label: 'Notebookok száma',
                data: @json($brands->pluck('darab'))
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } }
        }
    });

    new Chart(document.getElementById('osChart'), {
        type: 'doughnut',
        data: {
            labels: @json($os->pluck('nev')),
            datasets: [{ data: @json($os->pluck('gepek_count')) }]
        },
        options: { responsive: true }
    });

    new Chart(document.getElementById('priceChart'), {
        type: 'pie',
        data: {
            labels: @json($price->pluck('sav')),
            datasets: [{ data: @json($price->pluck('darab')) }]
        },
        options: { responsive: true }
    });
</script>
@endpush
