@extends('layouts.app')

@section('title', 'Notebook módosítása – ReNew Kft.')

@section('content')
<div class="container my-4" style="max-width: 900px">
    <div class="content-card">
        <h1>Notebook módosítása</h1>
        <form method="POST" action="{{ route('crud.update', $gep) }}" class="row g-2">
            @csrf
            @method('PUT')
            @include('partials.gep-form', ['gep' => $gep])
            <div class="col-12 d-flex gap-2 mt-3">
                <button class="btn btn-primary" type="submit">Módosítás mentése</button>
                <a class="btn btn-secondary" href="{{ route('crud') }}">Vissza</a>
            </div>
        </form>
    </div>
</div>
@endsection
