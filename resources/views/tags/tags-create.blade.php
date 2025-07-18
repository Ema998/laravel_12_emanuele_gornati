<x-layout>
    <x-header>
        <h1 class="text-center">AGGIUGNI UN TAG</h1>
    </x-header>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ route('tags.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nomeTag">Nome tag</label>
                        <input type="text" name="nome" value="{{ old('nome') }}" class="form-control" id="nomeTag">
                    </div>
                    <button type="submit" class="btn btn-primary">Inserisci</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
