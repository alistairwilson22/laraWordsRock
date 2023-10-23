<x-layout.layout>
    <div class="bg-gray-50 rounded max-w-lg mx-auto mt-6 mb-6 text-black">
        <header class="text-center bg-sky-700 p-4">
            <h2 class="text-2xl font-bold uppercase mb-1 text-white">
                Welcome to Words Rock!
            </h2>
        </header>
        <div class="text-center m-4 text-slate-700 text-lg">
            <p>Let's make spelling fun.</p>
            <p>Get started by playing a game.</p>
            <p>Press Say Word to hear a new word</p>
            <p>Re-type the word and press enter.</p>
            <p>Spell some words correctly and you'll get coins.</p>
            <p>Use the coins to buy awesome things.</p>
            <form action="{{route('game.index')}}" method="GET">
                <button class="bg-laravel rounded bg-sky-700 text-white p-4 mt-4">
                    <i class="fa-solid fa-play"></i> Play Now
                </button>
            </form>
        </div>
    </div>
</x-layout.layout>