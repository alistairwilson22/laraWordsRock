<x-layout.layout>
    <div class="bg-gray-50 rounded max-w-lg mx-auto mt-6 mb-6 text-black min-w-[80%] border-red-700 border-4" >
        <header class="text-center bg-red-700 p-4">
            <h2 class="text-2xl font-bold uppercase mb-1 text-white">
                <img class="inline-block w-6 mb-2" src="{{asset('pokeball.png')}}" /> Pokedex
            </h2>
        </header>
        <div class="text-center m-4">
            @include('partials._search')
            <div class="justify-center grid">
                <div class="grid grid-cols-3 md:grid-cols-6">
                    @foreach ($pokemon as $p)
                        <div class="m-4" x-data="{'isModalOpen': false}" x-on:keydown.escape="isModalOpen=false">
                            <div @click="isModalOpen = true">
                                <img src="{{$p->image}}" />
                                <p>{{ $p->name }}</p>
                                <p>{{ $p->classification }}</p>
                                <p class="text-yellow-500"><i class="fa-solid fa-coins"></i> {{ $p->coins }}</p>

                                <div class="modal" role="dialog" tabindex="-1" x-show="isModalOpen" x-cloak x-transition>
                                    
                                    <form action="/pokemon/{{$p->id}}/buy" method="POST">
                                        @csrf
                                        <button 
                                        type="submit" 
                                        value="Buy" 
                                        class="bg-laravel text-white rounded py-2 px-4 bg-black disabled:opacity-20" 
                                        @if(auth()->user()->coins_remaining < $p->coins) disabled @endif
                                        @if(auth()->user()->pokemons->find($p)) disabled @endif
                                        >
                                            Buy
                                        </button>
                                    </form>
                                    <button aria-label="Close" @click="isModalOpen=false">✖</button>
                                </div>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout.layout>