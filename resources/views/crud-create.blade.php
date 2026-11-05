@extends('layouts.app')

@section('title', 'Új notebook – ReNew Kft.')

@section('content')
<div class="container my-4" style="max-width: 900px">
    <div class="content-card">
        <h1>Új notebook felvétele</h1>
        <form method="POST" action="{{ route('crud.store') }}" class="row g-2">
            @csrf
            @include('partials.gep-form')
            <div class="col-12 d-flex gap-2 mt-3">
                <button class="btn btn-primary" type="submit">Mentés</button>
                <a class="btn btn-secondary" href="{{ route('crud') }}">Vissza</a>
            </div>
        </form>
    </div>
</div>
@endsection
