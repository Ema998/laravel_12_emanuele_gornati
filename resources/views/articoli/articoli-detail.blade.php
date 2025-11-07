<x-layout>
    <x-header>
        <h1 class="display-6 fw-semibold mb-3">{{ $article->titolo }}</h1>
        <p class="lead">Un articolo pubblicato nel nostro blog con tutti i dettagli e i tag associati.</p>
    </x-header>
    <div class="container py-5">
        <x-message/>
        <x-errors/>
        <div class="row g-4 align-items-start">
            <div class="col-lg-6">
                <div class="card shadow-sm border-0">
                    @if ($article->img)
                        <img src="{{ asset('storage/' . $article->img) }}" alt="{{ $article->titolo }}" class="card-img-top object-fit-cover" style="max-height: 360px;">
                    @else
                        <div class="ratio ratio-4x3 bg-light d-flex align-items-center justify-content-center">
                            <i class="bi bi-image text-secondary fs-1"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->titolo }}</h5>
                        <p class="card-text text-secondary mb-0">Pubblicato il {{ $article->created_at?->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Descrizione</h5>
                        <p class="card-text text-secondary">{{ $article->body }}</p>
                        @if ($article->tags->isNotEmpty())
                            <h6 class="mt-4">Tag</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($article->tags as $tag)
                                    <span class="badge bg-primary-subtle text-primary-emphasis px-3 py-2">{{ $tag->nome }}</span>
                                @endforeach
                            </div>
                        @endif
                        <div class="d-flex gap-2 mt-auto pt-4">
                            <a href="{{ route('articoli.edit', $article) }}" class="btn btn-outline-primary">
                                <i class="bi bi-pencil me-1"></i>Modifica
                            </a>
                            <form action="{{ route('articoli.destroy', $article) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash me-1"></i>Elimina
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>