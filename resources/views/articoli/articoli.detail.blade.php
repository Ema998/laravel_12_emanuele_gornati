<x-layout>
    <x-header>
        <h1 class="text-center">{{ $articolo['titolo'] }}</h1>
    </x-header>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $articolo['immagine'] }}" alt="{{ $articolo['nome'] }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p><strong>Nome:</strong> {{ $articolo['nome'] }}</p>
                <p><strong>Descrizione:</strong> {{ $articolo['body'] }}</p>
                <!--<p><strong>Creato da:</strong> {{ $articolo->user->nome }}</p>-->
                <div class="my-3 row">
                    <div class="col-12 col-md-3">
                        @if ($articolo->tags->isNotEmpty())
                            @foreach ($articolo->tags as $tag)
                                <p>{{ $tag->nome }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('articoli.delete', compact('articolo')) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina Articolo</button>
            </form>
        </div>
</x-layout>