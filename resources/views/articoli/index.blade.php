<x-layout>
    <x-header>
        <h1 class="text-center">I NOSTRI ARTICOLI</h1>
    </x-header>
    @foreach ($articoli as $articolo )
        <div class="col-12 col-md-6">
            <x-articoliCard 
                :articolo = "$articolo">             
            </x-articoliCard>  
        </div>
    @endforeach
    <button>
        <a href="{{ route('articoli.create') }}"class="btn btn-primary">Aggiungi un articolo</a>
    </button>
   <x-message/>
   <x-errors/>
</x-layout>