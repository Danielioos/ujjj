<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $felhasznalo = $request->user();

        if (!$felhasznalo) {
            return redirect()->route('login');
        }

        if (!in_array((string) $felhasznalo->role, $roles, true)) {
            abort(403, 'Nincs jogosultságod az oldal megtekintéséhez.');
        }

        return $next($request);
    }
}
