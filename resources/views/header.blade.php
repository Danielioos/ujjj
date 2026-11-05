<nav class="navbar navbar-expand-lg navbar-dark site-nav">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">ReNew Kft.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#foMenu" aria-controls="foMenu" aria-expanded="false" aria-label="Menü megnyitása">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="foMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Főoldal</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('adatbazis') ? 'active' : '' }}" href="{{ route('adatbazis') }}">Adatbázis</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('kapcsolat*') ? 'active' : '' }}" href="{{ route('kapcsolat') }}">Kapcsolat</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('diagram') ? 'active' : '' }}" href="{{ route('diagram') }}">Diagram</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('teszt*') ? 'active' : '' }}" href="{{ route('teszt') }}">Teszt</a></li>
                @auth
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('uzenetek') ? 'active' : '' }}" href="{{ route('uzenetek') }}">Üzenetek</a></li>
                    @if(auth()->user()->role === 1)
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('crud*') ? 'active' : '' }}" href="{{ route('crud') }}">CRUD</a></li>
                    @endif
                @endauth
            </ul>
            <div class="d-flex align-items-center gap-2">
                @auth
                    <span class="text-white small">{{ auth()->user()->felnev }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-light btn-sm" type="submit">Kijelentkezés</button>
                    </form>
                @else
                    <a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">Bejelentkezés</a>
                    <a class="btn btn-light btn-sm" href="{{ route('register') }}">Regisztráció</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
