@extends('layouts.app')

@section('title', 'Kapcsolat – ReNew Kft.')

@section('content')
<div class="container my-5" style="max-width: 760px">
    <h1>Kapcsolat</h1>
    <div class="content-card">
        <p>Kérdés vagy észrevétel esetén küldjön üzenetet!</p>
        <form method="POST" action="{{ route('kapcsolat.send') }}">
            @csrf
            <label class="form-label" for="nev">Név</label>
            <input class="form-control" type="text" id="nev" name="nev" value="{{ old('nev', auth()->check() ? auth()->user()->vnev . ' ' . auth()->user()->knev : '') }}" maxlength="100">
            <label class="form-label" for="email">E-mail cím</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email', auth()->user()?->email) }}" required maxlength="100">
            <label class="form-label" for="uzenet">Üzenet</label>
            <textarea class="form-control" id="uzenet" name="uzenet" rows="6" required minlength="5" maxlength="5000">{{ old('uzenet') }}</textarea>
            <button class="btn btn-primary" type="submit">Üzenet küldése</button>
        </form>
    </div>
</div>
@endsection
