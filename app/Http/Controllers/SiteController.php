<?php

namespace App\Http\Controllers;

use App\Models\Gep;
use App\Models\Kapcsolat;
use App\Models\Oprendszer;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        $kiemelt = Gep::with(['processzor', 'oprendszer'])
            ->orderBy('ar')
            ->take(6)
            ->get();

        return view('home', compact('kiemelt'));
    }

    public function database(Request $request)
    {
        $kereses = Gep::with(['processzor', 'oprendszer']);

        if ($request->filled('gyarto')) {
            $kereses->where('gyarto', 'like', '%' . $request->gyarto . '%');
        }

        if ($request->filled('oprendszer')) {
            $kereses->where('oprendszerid', $request->oprendszer);
        }

        $gepek = $kereses->orderBy('gyarto')
            ->orderBy('tipus')
            ->paginate(20)
            ->withQueryString();

        $oprendszerek = Oprendszer::orderBy('nev')->get();

        return view('database', compact('gepek', 'oprendszerek'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $adatok = $request->validate([
            'nev' => 'nullable|string|max:100',
            'email' => 'required|email|max:100',
            'uzenet' => 'required|string|min:5|max:5000',
        ]);

        $adatok['datum'] = now();

        Kapcsolat::create($adatok);

        return redirect()->route('kapcsolat')->with('siker', 'Köszönjük, az üzenetet sikeresen elküldtük.');
    }

    public function messages()
    {
        $adatok = Kapcsolat::orderByDesc('datum')
            ->orderByDesc('id')
            ->paginate(25);

        return view('messages', compact('adatok'));
    }

    public function chart()
    {
        $brands = Gep::selectRaw('gyarto, COUNT(*) as darab')
            ->groupBy('gyarto')
            ->orderByDesc('darab')
            ->get();

        $os = Oprendszer::withCount('gepek')
            ->orderByDesc('gepek_count')
            ->get();

        $price = Gep::selectRaw("CASE WHEN ar < 100000 THEN '100 ezer alatt' WHEN ar < 150000 THEN '100–149 ezer' WHEN ar < 200000 THEN '150–199 ezer' ELSE '200 ezer felett' END as sav, COUNT(*) as darab")
            ->groupBy('sav')
            ->get();

        return view('chart', compact('brands', 'os', 'price'));
    }
}
