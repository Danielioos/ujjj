<?php

namespace App\Http\Controllers;

use App\Models\Gep;
use App\Models\Oprendszer;
use App\Models\Processzor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GepController extends Controller
{
    public function index()
    {
        $gepek = Gep::with(['processzor', 'oprendszer'])
            ->orderByDesc('id')
            ->paginate(20);

        return view('crud', compact('gepek'));
    }

    public function create()
    {
        $processzorok = Processzor::orderBy('gyarto')->orderBy('tipus')->get();
        $oprendszerek = Oprendszer::orderBy('nev')->get();

        return view('crud-create', compact('processzorok', 'oprendszerek'));
    }

    public function store(Request $request)
    {
        $adatok = $this->ellenorzes($request);

        Gep::create($adatok);

        return redirect()->route('crud')->with('siker', 'A notebook sikeresen létrejött.');
    }

    public function edit(Gep $gep)
    {
        $processzorok = Processzor::orderBy('gyarto')->orderBy('tipus')->get();
        $oprendszerek = Oprendszer::orderBy('nev')->get();

        return view('crud-edit', compact('gep', 'processzorok', 'oprendszerek'));
    }

    public function update(Request $request, Gep $gep)
    {
        $adatok = $this->ellenorzes($request);

        $gep->update($adatok);

        return redirect()->route('crud')->with('siker', 'A notebook adatai frissültek.');
    }

    public function destroy(Gep $gep)
    {
        $gep->delete();

        return redirect()->route('crud')->with('siker', 'A notebook törölve.');
    }

    private function ellenorzes(Request $request): array
    {
        return $request->validate([
            'gyarto' => 'required|string|max:8',
            'tipus' => 'required|string|max:100',
            'kijelzo' => 'required|string|max:8',
            'memoria' => 'required|integer|min:1',
            'merevlemez' => 'required|integer|min:1',
            'videovezerlo' => 'required|string|max:100',
            'ar' => 'required|integer|min:0',
            'processzorid' => ['required', 'integer', Rule::exists('processzor', 'id')],
            'oprendszerid' => ['required', 'integer', Rule::exists('oprendszer', 'id')],
            'db' => 'required|integer|min:0',
        ]);
    }
}
