<x-layout>
    <x-header>
        <h1 class="text-center">{{ $article['titolo'] }}</h1>
    </x-header>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $article['immagine'] }}" alt="{{ $article['nome'] }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p><strong>Nome:</strong> {{ $article['nome'] }}</p>
                <p><strong>Descrizione:</strong> {{ $article['body'] }}</p>
                <!--<p><strong>Creato da:</strong> {{ $article->user->nome }}</p>-->
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
            <form action="{{ route('articoli.delete', compact('article')) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina articolo</button>
            </form>
        </div>
</x-layout>