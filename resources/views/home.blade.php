@extends('layouts.app')

@section('title', 'ReNew Kft. – Főoldal')

@section('content')
<section class="hero my-4">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <p class="text-uppercase text-primary fw-bold">ReNew Kft. · Fenntartható technológia</p>
                <h1 class="display-5 fw-bold">Minőségi, gyárilag felújított notebookok kedvező áron</h1>
                <p class="lead">Válogasson ellenőrzött, felújított laptopjaink között! A ReNew Kft. célja, hogy megbízható számítástechnikai eszközöket kínáljon kedvező áron, a környezet terhelésének csökkentésével.</p>
                <a class="btn btn-primary btn-lg" href="{{ route('adatbazis') }}">Notebookok megtekintése</a>
            </div>
            <div class="col-lg-5 text-center">
                <img src="{{ asset('image.png') }}" class="img-fluid rounded-4" alt="Notebook" style="max-height: 320px">
            </div>
        </div>
    </div>
</section>

<div class="container my-5">
    <h2 class="mb-3">Kiemelt notebookok</h2>
    <div class="row g-3">
        @forelse($kiemelt as $gep)
            <div class="col-sm-6 col-lg-4">
                <div class="content-card h-100">
                    <h5>{{ $gep->gyarto }} {{ $gep->tipus }}</h5>
                    <p class="mb-1">{{ $gep->memoria }} MB RAM · {{ $gep->merevlemez }} GB HDD</p>
                    <p class="mb-1">{{ $gep->processzor?->tipus }} · {{ $gep->oprendszer?->nev }}</p>
                    <strong>{{ number_format($gep->ar, 0, ',', ' ') }} Ft</strong>
                </div>
            </div>
        @empty
            <p>Jelenleg nincs megjeleníthető notebook.</p>
        @endforelse
    </div>

    <div class="row g-3 mt-3">
        <div class="col-md-4">
            <div class="stat">
                <h5>Átvizsgált eszközök</h5>
                <p class="mb-0">A kínálatban szereplő notebookok gyárilag felújított készülékek.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat">
                <h5>Kedvező árak</h5>
                <p class="mb-0">A cél a jó ár-érték arány biztosítása.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat">
                <h5>Fenntarthatóság</h5>
                <p class="mb-0">A felújítás hozzájárul az elektronikai hulladék csökkentéséhez.</p>
            </div>
        </div>
    </div>
</div>
@endsection
