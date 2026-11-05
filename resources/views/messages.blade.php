@extends('layouts.app')

@section('title', 'Üzenetek – ReNew Kft.')

@section('content')
<div class="container my-4">
    <h1>Beérkezett üzenetek</h1>
    <div class="content-card table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>Küldő</th>
                    <th>E-mail</th>
                    <th>Üzenet</th>
                    <th>Küldés ideje</th>
                </tr>
            </thead>
            <tbody>
                @forelse($adatok as $adat)
                    <tr>
                        <td>{{ $adat->nev ?: 'Vendég' }}</td>
                        <td>{{ $adat->email }}</td>
                        <td>{{ $adat->uzenet }}</td>
                        <td>{{ $adat->datum?->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4">Még nincs üzenet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $adatok->links() }}
</div>
@endsection
