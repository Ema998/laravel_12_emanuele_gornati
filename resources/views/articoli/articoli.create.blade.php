<x-layout>
    <x-header>
        <h1 class="text-center">AGGIUGNI UN ARTICOLO</h1>
    </x-header>
    <x-errors/>
    <x-message/>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ route('articoli.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titoloArticolo">Titolo articolo</label>
                        <input type="text" name="titolo" value="{{ old('titolo') }}" class="form-control" id="titoloArticolo">
                    </div>
                    <div class="form-group">
                        <label for="bodyArticolo">Contenuto</label>
                        <textarea class="form-control" name="body" id="bodyArticolo" rows="3">{{ old('body') }}</textarea>
                    </div>
                    <div class="my-3">
                        @foreach ($tags as $tag)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkTags" name="tags[]" value="{{$tag->id}}">
                                <label class="form-check-label" for="checkTags">{{$tag->nome}}</label>
                            </div>
                        @endforeach
                        <a href="{{ route('tags.create') }}">Crea un tag</a>
                    </div>

                    <!-- Tags con select multiple 
                    <div class="my-3">
                        <label for="tags">Seleziona i tag:</label>
                        <select name="tags[]" id="tags" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->nome }}</option>
                            @endforeach
                        </select> 
                        <a href="{{ route('tags.create') }}">Crea un tag</a>
                    </div> -->

                    <div class="form-group">
                        <label for="imgArticolo">Inserisci un'immagine</label>
                        <input type="file" name="img" class="form-control" id="imgArticolo">
                    </div>
                    <button type="submit" class="btn btn-primary">Inserisci</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
