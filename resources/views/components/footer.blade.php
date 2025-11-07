<footer class="bg-dark text-white py-4 mt-auto">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between gap-2">
            <span class="small">&copy; {{ date('Y') }} Blog – Tutti i diritti riservati.</span>
            <div class="d-flex gap-3">
                <a class="link-light small text-decoration-none" href="{{ route('articoli.create') }}">Scrivi un articolo</a>
                <a class="link-light small text-decoration-none" href="{{ route('tags.index') }}">Scopri i tag</a>
            </div>
        </div>
    </footer>