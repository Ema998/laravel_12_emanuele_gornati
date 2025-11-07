<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $viteManifestExists = file_exists(public_path('build/manifest.json'));
    @endphp

    @if ($viteManifestExists)
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    @endif
    <title>Blog</title>
</head>
<body class="bg-light text-body d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('homepage') }}">
                <i class="bi bi-journal-richtext me-2"></i>Blog
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('homepage') ? 'active' : '' }}" href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('articoli.create') ? 'active' : '' }}" href="{{ route('articoli.create') }}">Nuovo articolo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tags.index') ? 'active' : '' }}" href="{{ route('tags.index') }}">Elenco tag</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tags.create') ? 'active' : '' }}" href="{{ route('tags.create') }}">Crea tag</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        {{ $slot }}
    </main>

    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between gap-2">
            <span class="small">&copy; {{ date('Y') }} Blog – Tutti i diritti riservati.</span>
            <div class="d-flex gap-3">
                <a class="link-light small text-decoration-none" href="{{ route('articoli.create') }}">Scrivi un articolo</a>
                <a class="link-light small text-decoration-none" href="{{ route('tags.index') }}">Scopri i tag</a>
            </div>
        </div>
    </footer>
</body>
</html>