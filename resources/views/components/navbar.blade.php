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