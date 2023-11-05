<nav class="flex justify-between items-center bg-sky-700 text-white p-4">
    <a href="/">
        <img class="w-48" src="{{asset('WordsRockLogo.png')}}" alt="" class="logo"/>
    </a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth
        <li>
            <a href="/profile" class="hover:text-laravel font-bold uppercase">
                <i class="fa-solid fa-user"></i> {{auth()->user()->name}}
            </a>
        </li>
        <li>
            <a href="/leaderboard" class="hover:text-laravel">
                <i class="fa-solid fa-award"></i> {{auth()->user()->level}}
            </a>
        </li>
        <li>
            <a href="/pokedex" class="hover:text-laravel">
                <img class="inline-block w-5 mb-2" src="{{asset('pokeball.png')}}" /> {{auth()->user()->pokemons->count()}}
            </a>
        </li>
        <li>
            <i class="fa-solid fa-coins"></i> {{auth()->user()->coins_remaining}}
        </li>
        <li>
            <a href="/game" class="hover:text-laravel"
                ><i class="fa-solid fa-gamepad"></i>
                Play Game</a>
        </li>
        <li>
            <form method="POST" action="/logout">
            @csrf
            <button type="submit"><i class="fa-solid fa-door-closed"></i>Log out</button>
            </form>
        </li>
        @else
        <li>
            <a href="/register" class="hover:text-laravel"
                ><i class="fa-solid fa-user-plus"></i> Register</a
            >
        </li>
        <li>
            <a href="/login" class="hover:text-laravel"
                ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                Login</a
            >
        </li>
        @endauth
    </ul>
</nav>