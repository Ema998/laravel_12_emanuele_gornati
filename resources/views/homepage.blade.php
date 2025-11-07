<x-layout>
    <x-header>
        <h1 class="display-5 fw-semibold mb-3">I nostri articoli</h1>
        <p class="lead mb-4">Scopri storie, consigli e approfondimenti selezionati per te dalla nostra redazione.</p>
        <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
            <a href="{{ route('articoli.create') }}" class="btn btn-light btn-lg px-4">
                <i class="bi bi-pencil-square me-2"></i>Scrivi un articolo
            </a>
            <a href="{{ route('tags.index') }}" class="btn btn-outline-light btn-lg px-4">
                <i class="bi bi-tags me-2"></i>Scopri i tag
            </a>
        </div>
    </x-header>
    <div class="container py-5">
        <x-message/>
        <x-errors/>
        <div class="article-grid">
            @forelse ($articles as $article)
                <x-articoliCard :article="$article" />
            @empty
                <div class="alert alert-info">Non ci sono articoli al momento. Inizia tu a scriverne uno!</div>
            @endforelse
        </div>
    </div>
</x-layout>