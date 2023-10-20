<nav class="flex justify-between items-center bg-sky-700 text-white p-4">
    <a href="/"
        ><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo"
    /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth
        <li>
            <span class="font-bold uppercase">
                {{auth()->user()->name}}
            </span>
        </li>
        <li>
            <i class="fa-solid fa-award"></i> {{auth()->user()->level}}
        </li>
        <li>
            <i class="fa-solid fa-coins"></i> {{auth()->user()->coins}}
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