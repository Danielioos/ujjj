<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ReNew Kft. – Felújított notebookok')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('index.css') }}">
    <link rel="stylesheet" href="{{ asset('crud.css') }}">
    <style>
        body { min-height: 100vh; display: flex; flex-direction: column; }
        .site-main { flex: 1; }
        .site-nav { background: #182333; }
        .site-footer { text-align: center; padding: 1.2rem; background: #182333; color: #fff; margin-top: 2rem; }
        .content-card { background: #fff; border-radius: 14px; padding: 1.5rem; box-shadow: 0 8px 28px #00000012; margin: 1.5rem auto; }
        .table-responsive { overflow-x: auto; }
        .alert { max-width: 1100px; margin: 1rem auto; }
        .form-control, .form-select { margin-bottom: .75rem; }
        .hero { padding: 3rem 1rem; background: linear-gradient(120deg, #e8f3ff, #f7fbff); border-radius: 18px; }
        .stat { background: #f4f8fc; border-radius: 12px; padding: 1rem; }
        .pagination { justify-content: center; }
    </style>
    @stack('head')
</head>
<body>
    @include('header')

    @if(session('siker'))
        <div class="alert alert-success">{{ session('siker') }}</div>
    @endif
    @if(session('hiba'))
        <div class="alert alert-danger">{{ session('hiba') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main class="site-main container-fluid">
        @yield('content')
    </main>

    <footer class="site-footer">
        <p class="mb-1">© {{ date('Y') }} – ReNew Kft.</p>
        <small>Készítők: DUDÁS VIVIEN (BBSLXC) és GOMBÁR DÁNIEL (ITCK81)</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
