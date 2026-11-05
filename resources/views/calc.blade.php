@extends('layouts.app')

@section('title', 'Teszt – ReNew Kft.')

@section('content')
<div class="container my-5" style="max-width: 650px">
    <div class="content-card">
        <h1>Számológép</h1>
        <p class="text-muted">A négy alapművelet kipróbálása.</p>

        @if($result !== null)
            <div class="alert alert-success" data-testid="result">
                {{ $a }} {{ $symbol }} {{ $b }} = <strong>{{ $result }}</strong>
            </div>
        @endif

        @if($error !== null)
            <div class="alert alert-danger" data-testid="error">{{ $error }}</div>
        @endif

        <form method="POST" action="{{ route('teszt.calculate') }}">
            @csrf
            <label class="form-label" for="a">Első szám</label>
            <input class="form-control" id="a" type="number" name="a" value="{{ old('a', $a) }}" required>
            <label class="form-label" for="b">Második szám</label>
            <input class="form-control" id="b" type="number" name="b" value="{{ old('b', $b) }}" required>
            <label class="form-label" for="op">Művelet</label>
            <select class="form-select" id="op" name="op">
                <option value="add" @selected(old('op', $op) === 'add')>Összeadás (+)</option>
                <option value="sub" @selected(old('op', $op) === 'sub')>Kivonás (-)</option>
                <option value="mul" @selected(old('op', $op) === 'mul')>Szorzás (*)</option>
                <option value="divide" @selected(old('op', $op) === 'divide')>Osztás (/)</option>
            </select>
            <button class="btn btn-primary" type="submit">Számítás</button>
        </form>
    </div>
</div>
@endsection
