<x-layout.layout>
    <div class="bg-gray-50 rounded max-w-lg mx-auto mt-6 mb-6 text-black min-w-[50%]">
        <header class="text-center bg-sky-700 p-4">
            <h2 class="text-2xl font-bold uppercase mb-1 text-white">
                <i class="fa-solid fa-award"></i> Leaderboard
            </h2>
        </header>
        <div class="text-center m-4">
            <div class="justify-center grid">
                <div class="m-4">
                    <div class="grid">
                        <div class="grid grid-cols-5 font-bold">
                            <div class="p-2">Rank</div>
                            <div class="p-2">User</div>
                            <div class="p-2">Level</div>
                            <div class="p-2">Pokemon</div>
                            <div class="p-2">Total Coins</div>
                        </div>
                    </div>
                    <div>
                        @foreach ($leaderboard as $user)
                            <a href="/pokedex/{{$user->id}}"><div class='grid grid-cols-5 @if ($user->id === Auth::id()) highlighted bg-sky-200 @endif'>
                                <div class="p-2">{{ $loop->iteration }}</div>
                                <div class="p-2">{{ $user->name }}</div>
                                <div class="p-2">{{ $user->level }}</div>
                                <div class="p-2">{{ $user->pokemons->count() }}</div>
                                <div class="p-2">{{ $user->coins_total }}</div>
                            </div></a>
                        @endforeach
                    </div>
                </table>
            </div>
            
            {{ $leaderboard->links() }}

    </div>
</x-layout.layout>