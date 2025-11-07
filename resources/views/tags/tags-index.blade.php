<x-layout>
    <x-header>
        <h1 class="display-6 fw-semibold mb-3">Elenco tag</h1>
        <p class="lead">Tutti i tag disponibili per filtrare gli articoli del blog.</p>
    </x-header>
    <div class="container py-5">
        <x-message/>
        <x-errors/>
        <div class="row g-4">
            @forelse ($tags as $tag)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card tags-card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-semibold mb-2">{{ $tag->nome }}</h5>
                                <p class="text-secondary mb-0">Articoli collegati: {{ $tag->articoli()->count() }}</p>
                            </div>
                            <div class="mt-3">
                                <span class="badge bg-primary-subtle text-primary-emphasis">Tag</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Non ci sono tag disponibili.</div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>