@extends('layouts.app')

@section('title', 'Adatbázis – ReNew Kft.')

@section('content')
<div class="container my-4">
    <h1>Notebook adatbázis</h1>
    <p class="text-muted">A notebookok adatai a gép, processzor és operációs rendszer táblák összekapcsolásával jelennek meg.</p>

    <form class="row g-2 mb-3" method="GET" action="{{ route('adatbazis') }}">
        <div class="col-md-5">
            <label class="visually-hidden" for="gyarto">Gyártó keresése</label>
            <input class="form-control" id="gyarto" name="gyarto" value="{{ request('gyarto') }}" placeholder="Gyártó keresése">
        </div>
        <div class="col-md-5">
            <label class="visually-hidden" for="oprendszer">Operációs rendszer</label>
            <select class="form-select" id="oprendszer" name="oprendszer">
                <option value="">Minden operációs rendszer</option>
                @foreach($oprendszerek as $oprendszer)
                    <option value="{{ $oprendszer->id }}" @selected(request('oprendszer') == $oprendszer->id)>{{ $oprendszer->nev }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100" type="submit">Szűrés</button>
        </div>
    </form>

    <div class="content-card table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>Gyártó</th>
                    <th>Típus</th>
                    <th>Kijelző</th>
                    <th>Memória</th>
                    <th>HDD</th>
                    <th>Videóvezérlő</th>
                    <th>Processzor</th>
                    <th>Operációs rendszer</th>
                    <th>Ár</th>
                    <th>Raktár</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gepek as $gep)
                    <tr>
                        <td>{{ $gep->gyarto }}</td>
                        <td>{{ $gep->tipus }}</td>
                        <td>{{ $gep->kijelzo }}”</td>
                        <td>{{ $gep->memoria }} MB</td>
                        <td>{{ $gep->merevlemez }} GB</td>
                        <td>{{ $gep->videovezerlo }}</td>
                        <td>{{ $gep->processzor?->gyarto }} {{ $gep->processzor?->tipus }}</td>
                        <td>{{ $gep->oprendszer?->nev }}</td>
                        <td>{{ number_format($gep->ar, 0, ',', ' ') }} Ft</td>
                        <td>{{ $gep->db }} db</td>
                    </tr>
                @empty
                    <tr><td colspan="10">Nincs találat.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $gepek->links('pagination::bootstrap-5') }}
</div>
@endsection
