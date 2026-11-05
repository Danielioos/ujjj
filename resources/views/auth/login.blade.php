@extends('layouts.app')

@section('title', 'Bejelentkezés – ReNew Kft.')

@section('content')
<div class="container my-5" style="max-width: 560px">
    <div class="content-card">
        <h1>Bejelentkezés</h1>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <label class="form-label" for="felnev">Felhasználónév</label>
            <input class="form-control" id="felnev" name="felnev" value="{{ old('felnev') }}" required>
            <label class="form-label" for="jelszo">Jelszó</label>
            <input class="form-control" id="jelszo" type="password" name="jelszo" required>
            <button class="btn btn-primary" type="submit">Belépés</button>
        </form>
        <p class="mt-3 mb-0">Még nincs fiókod? <a href="{{ route('register') }}">Regisztráció</a></p>
    </div>
</div>
@endsection
