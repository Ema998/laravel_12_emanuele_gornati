<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ Storage::url($articolo->img)}}" alt="Copertina di {{ $articolo->titolo }}">
  <div class="card-body justify-content-center align-items-center">
    <h5 class="card-title">{{$articolo->titolo}}</h5>
    <!--<h6 class="card-subtitle mb-2 text-left">Aggiunto da {{ $articolo->user->nome }}</h6> -->
    <p class="card-text">{{$articolo->body}}</p>
    @if ($articolo->tags->isNotEmpty())
      <div class="my-3 justify-content-around align-items-center">
        @foreach ($articolo->tags as $tag)
          <span class="badge badge-prymary">{{ $tag->nome }}</span>
        @endforeach
      </div>
    @endif
    <a href="{{ route('articoli.detail', compact('articolo')) }}" class="btn btn-primary my-4">Scopri di più</a>
    <a href="{{ route('articoli.edit', compact('articolo')) }}" class="btn btn-secondary">Modifica</a>  
  </div>
</div>