<x-layout>
    <x-header>
        <h1 class="display-6 fw-semibold mb-3" style="text-transform: uppercase;">{{$tag->nome}}</h1>
        <p class="lead">Tutti gli articoli che parlano di {{$tag->nome}}.</p>
    </x-header>
    <div class="container py-5">
        <x-message/>
        <x-errors/>
        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card article-card h-100">
                        @if ($article->img)
                            <img class="card-img-top" src="{{ Storage::url($article->img) }}"  alt="Copertina di {{ $article->titolo }}" style="height: 300px; object-fit: cover; width: 100%;">
                        @else
                            <img class="card-img-top" src="https://picsum.photos/800/600" alt="Copertina di {{ $article->titolo }}" style="height: 300px; object-fit: cover; width: 100%;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <div class="mb-3">
                                <h5 class="card-title fw-semibold">{{ $article->titolo }}</h5>
                                <p class="card-text text-secondary">{{ \Illuminate\Support\Str::limit($article->body, 160) }}</p>
                            </div>
                                @if ($article->tags->isNotEmpty())
                                <div class="d-flex flex-wrap gap-2 mb-4">
                                    @foreach ($article->tags as $tag)
                                    <span class="badge px-3 py-2">{{ $tag->nome }}</span>
                                    @endforeach
                                </div>
                                @endif
                                <div class="mt-auto d-flex gap-2">
                                <a href="{{ route('articoli.show', $article) }}" class="btn btn-primary flex-grow-1">
                                    <i class="bi bi-box-arrow-up-right me-1"></i>Dettagli
                                </a>
                                <a href="{{ route('articoli.edit', $article) }}" class="btn btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Non ci sono articoli con questo tag.</div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>