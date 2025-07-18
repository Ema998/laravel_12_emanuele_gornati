<x-layout>
    <x-header>
        <h1 class="text-center">ELENCO TAG</h1>
    </x-header>
    @foreach ($tags as $tag )
        <div class="col-12 col-md-6">
            <x-tagsCard 
                :tag = "$tag">             
            </x-tagsCard>  
        </div>
    @endforeach
   <x-message/>
   <x-errors/>
</x-layout>