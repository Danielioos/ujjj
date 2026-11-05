@extends('layouts.app')

@section('title', 'Regisztráció – ReNew Kft.')

@section('content')
<div class="container my-5" style="max-width: 650px">
    <div class="content-card">
        <h1>Regisztráció</h1>
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <label class="form-label" for="vnev">Vezetéknév</label>
            <input class="form-control" id="vnev" name="vnev" value="{{ old('vnev') }}" required maxlength="100">
            <label class="form-label" for="knev">Keresztnév</label>
            <input class="form-control" id="knev" name="knev" value="{{ old('knev') }}" required maxlength="100">
            <label class="form-label" for="felnev">Felhasználónév</label>
            <input class="form-control" id="felnev" name="felnev" value="{{ old('felnev') }}" required maxlength="100">
            <label class="form-label" for="email">E-mail</label>
            <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required maxlength="100">
            <label class="form-label" for="jelszo">Jelszó (min. 8 karakter)</label>
            <input class="form-control" id="jelszo" type="password" name="jelszo" required>
            <label class="form-label" for="jelszo_confirmation">Jelszó újra</label>
            <input class="form-control" id="jelszo_confirmation" type="password" name="jelszo_confirmation" required>
            <button class="btn btn-primary" type="submit">Regisztráció</button>
        </form>
    </div>
</div>
@endsection
