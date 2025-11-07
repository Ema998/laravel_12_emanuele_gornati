<x-layout>
    <x-header>
        <h1 class="display-6 fw-semibold mb-3">Aggiungi un articolo</h1>
        <p class="lead">Condividi novità, idee e approfondimenti con la nostra community.</p>
    </x-header>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <x-errors/>
                <x-message/>
                <div class="form-card mt-4">
                    <form method="POST" action="{{ route('articoli.store') }}" enctype="multipart/form-data" class="row g-4">
                        @csrf
                        <div class="col-12">
                            <label for="titoloArticolo" class="form-label">Titolo articolo</label>
                            <input type="text" name="titolo" value="{{ old('titolo') }}" class="form-control form-control-lg" id="titoloArticolo" placeholder="Inserisci il titolo">
                        </div>
                        <div class="col-12">
                            <label for="bodyArticolo" class="form-label">Contenuto</label>
                            <textarea class="form-control" name="body" id="bodyArticolo" rows="6" placeholder="Scrivi il contenuto">{{ old('body') }}</textarea>
                        </div>
                        <div class="col-12">
                            <span class="form-label d-block mb-2">Tag disponibili</span>
                            <div class="row g-2">
                                @foreach ($tags as $tag)
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                id="tag{{ $tag->id }}"
                                                name="tags[]"
                                                value="{{ $tag->id }}"
                                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="tag{{ $tag->id }}">{{$tag->nome}}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('tags.create') }}" class="link-primary text-decoration-none">Crea un nuovo tag</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="imgArticolo" class="form-label">Immagine di copertina</label>
                            <input type="file" name="img" class="form-control" id="imgArticolo">
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">Inserisci</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
