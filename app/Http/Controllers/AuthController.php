<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $adatok = $request->validate([
            'felnev' => 'required|string',
            'jelszo' => 'required|string',
        ]);

        $sikeres = Auth::attempt([
            'felnev' => $adatok['felnev'],
            'password' => $adatok['jelszo'],
        ]);

        if (!$sikeres) {
            return back()->with('hiba', 'Hibás felhasználónév vagy jelszó!')
                ->withInput($request->only('felnev'));
        }

        $request->session()->regenerate();

        return redirect()->intended(route('home'))->with('siker', 'Sikeres bejelentkezés!');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $adatok = $request->validate([
            'vnev' => 'required|string|max:100',
            'knev' => 'required|string|max:100',
            'felnev' => 'required|string|max:100|unique:users,felnev',
            'email' => 'required|email|max:100|unique:users,email',
            'jelszo' => 'required|string|min:8|confirmed',
        ]);

        $felhasznalo = User::create([
            'vnev' => $adatok['vnev'],
            'knev' => $adatok['knev'],
            'felnev' => $adatok['felnev'],
            'email' => $adatok['email'],
            'password' => Hash::make($adatok['jelszo']),
            'role' => 2,
        ]);

        Auth::login($felhasznalo);
        $request->session()->regenerate();

        return redirect()->route('home')->with('siker', 'Sikeres regisztráció!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('siker', 'Sikeresen kijelentkeztél.');
    }
}
