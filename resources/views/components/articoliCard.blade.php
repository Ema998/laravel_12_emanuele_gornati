<div class="card article-card h-100">
  @if ($article->img)
    <img class="card-img-top" src="{{ asset('storage/' . $article->img) }}" alt="Copertina di {{ $article->titolo }}">
  @else
    <div class="ratio ratio-16x9 bg-light d-flex align-items-center justify-content-center">
      <i class="bi bi-image text-secondary fs-2"></i>
    </div>
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