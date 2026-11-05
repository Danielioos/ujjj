@extends('layouts.app')

@section('title', 'Notebook CRUD – ReNew Kft.')

@section('content')
<div class="container my-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div>
            <h1>Notebookok kezelése</h1>
            <p class="text-muted mb-0">Új notebook felvétele, módosítása és törlése.</p>
        </div>
        <a class="btn btn-primary" href="{{ route('crud.create') }}">Új notebook felvétele</a>
    </div>

    <div class="content-card">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gyártó / típus</th>
                        <th>Processzor</th>
                        <th>Operációs rendszer</th>
                        <th>Memória</th>
                        <th>HDD</th>
                        <th>Ár</th>
                        <th>Raktár</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gepek as $gep)
                        <tr>
                            <td>{{ $gep->id }}</td>
                            <td>{{ $gep->gyarto }} {{ $gep->tipus }}</td>
                            <td>{{ $gep->processzor?->gyarto }} {{ $gep->processzor?->tipus }}</td>
                            <td>{{ $gep->oprendszer?->nev }}</td>
                            <td>{{ $gep->memoria }} MB</td>
                            <td>{{ $gep->merevlemez }} GB</td>
                            <td>{{ number_format($gep->ar, 0, ',', ' ') }} Ft</td>
                            <td>{{ $gep->db }} db</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-sm btn-warning" href="{{ route('crud.edit', $gep) }}">Szerkesztés</a>
                                    <form method="POST" action="{{ route('crud.delete', $gep) }}" onsubmit="return confirm('Biztosan törlöd ezt a notebookot?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Törlés</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="9">Nincs notebook az adatbázisban.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $gepek->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
