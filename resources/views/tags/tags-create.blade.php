<x-layout>
    <x-header>
        <h1 class="display-6 fw-semibold mb-3">Crea un nuovo tag</h1>
        <p class="lead">Organizza gli articoli per argomenti, rendendo più semplice la navigazione.</p>
    </x-header>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <x-message/>
                <x-errors/>
                <div class="form-card mt-4">
                    <form method="POST" action="{{ route('tags.store') }}" class="row g-4">
                        @csrf
                        <div class="col-12">
                            <label for="nomeTag" class="form-label">Nome del tag</label>
                            <input type="text" name="nome" value="{{ old('nome') }}" class="form-control form-control-lg" id="nomeTag" placeholder="Es. Tecnologia">
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
