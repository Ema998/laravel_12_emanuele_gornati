<x-layout>
    <x-header>
        <h1 class="text-center">I NOSTRI ARTICOLI</h1>
    </x-header>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            @foreach ($articoli as $article )
                <div class="col-12 col-md-6">
                    <x-articoliCard :article="$article" />
                </div>
            @endforeach
            <button>
                <a href="{{ route('articoli.create') }}"class="btn btn-primary">Aggiungi un articolo</a>
            </button>
        </div>
    </div>
   <x-message/>
   <x-errors/>
</x-layout>