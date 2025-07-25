<x-layout>
    <x-header>
        <h1 class="text-center">{{ $article->titolo }}</h1>
    </x-header>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $article->img }}" alt="{{ $article->titolo }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p><strong>Nome:</strong> {{ $article->titolo }}</p>
                <p><strong>Descrizione:</strong> {{ $article->body }}</p>
                <div class="my-3 row">
                    <div class="col-12 col-md-3">
                        @if ($article->tags->isNotEmpty())
                            @foreach ($article->tags as $tag)
                                <p>{{ $tag->nome }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('articoli.destroy', compact('article')) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina articolo</button>
            </form>
        </div>
    </div>
</x-layout>