<x-layout.layout>
    <div class="bg-gray-50 rounded max-w-lg mx-auto mt-6 mb-6 text-black min-w-[80%] border-red-700 border-4">
        <header class="text-center bg-red-700 p-4">
            <h2 class="text-2xl font-bold uppercase mb-1 text-white">
                <img class="inline-block w-6 mb-2" src="{{asset('pokeball.png')}}" /> {{$user->name}}'s Pokedex
            </h2>
        </header>
        <div class="text-center m-4">
            <div class="justify-center grid">
                <div class="grid grid-cols-3 md:grid-cols-6">
                    @foreach ($pokemon as $p)
                        <div class="m-4">
                            <img src="../{{$p->image}}" class="@unless($user->pokemons->find($p)) opacity-10 @endunless" />
                            <p>{{ $p->name }}</p>
                            <p>{{ $p->classification }}</p>
                        </div>
                    @endforeach
                </div>
    </div>
</x-layout.layout>