<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ Storage::url($article->img)}}" alt="Copertina di {{ $article->titolo }}">
  <div class="card-body justify-content-center align-items-center">
    <h5 class="card-title">{{$article->titolo}}</h5>
    <p class="card-text">{{$article->body}}</p>
    @if ($article->tags->isNotEmpty())
      <div class="d-flex my-3 justify-content-around align-items-center">
        @foreach ($article->tags as $tag)
          <span class="badge badge-primary">{{ $tag->nome }}</span>
        @endforeach
      </div>
    @endif
    <a href="{{ route('articoli-detail', compact('article')) }}" class="btn btn-primary my-4">Scopri di più</a>
    <a href="{{ route('articoli-edit', compact('article')) }}" class="btn btn-secondary">Modifica</a>  
  </div>
</div>