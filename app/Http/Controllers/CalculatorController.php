<?php

namespace App\Http\Controllers;

use App\Services\Calculator;
use Illuminate\Http\Request;
use Illuminate\View\View;
use InvalidArgumentException;

class CalculatorController extends Controller
{
    public function __construct(private readonly Calculator $calculator)
    {
    }

    public function showForm(): View
    {
        return view('calc', [
            'a' => 0,
            'b' => 0,
            'op' => 'add',
            'result' => null,
            'symbol' => null,
            'error' => null,
        ]);
    }

    public function calculate(Request $request): View
    {
        $adatok = $request->validate([
            'a' => 'required|integer',
            'b' => 'required|integer',
            'op' => 'required|in:add,sub,mul,divide',
        ]);

        $a = (int) $adatok['a'];
        $b = (int) $adatok['b'];
        $op = $adatok['op'];
        $jelek = [
            'add' => '+',
            'sub' => '-',
            'mul' => '*',
            'divide' => '/',
        ];

        $eredmeny = [
            'a' => $a,
            'b' => $b,
            'op' => $op,
            'result' => null,
            'symbol' => $jelek[$op],
            'error' => null,
        ];

        try {
            $ertek = match ($op) {
                'add' => $this->calculator->add($a, $b),
                'sub' => $this->calculator->subtract($a, $b),
                'mul' => $this->calculator->multiply($a, $b),
                'divide' => $this->calculator->divide($a, $b),
            };

            $eredmeny['result'] = $op === 'divide'
                ? number_format($ertek, 2, ',', '')
                : (string) $ertek;
        } catch (InvalidArgumentException $hiba) {
            $eredmeny['error'] = $hiba->getMessage();
        }

        return view('calc', $eredmeny);
    }
}
