<!-- Search -->
<form action="" method="GET">
    <div class="relative m-4 rounded-lg">
        <div class="absolute top-4 left-3">
            <i
                class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
            ></i>
        </div>
        <input
            type="text"
            name="search"
            class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
            placeholder="Search Pokedex"
        />
        <div class="absolute top-2 right-2">
            <button
                type="submit"
                class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
            >
                Search
            </button>
        </div>
        <div class="text-right mt-[10px]">
            <p>Generation:
                @for ($i = 1; $i <= 6; $i++)
                <a href="?generation={{$i}}" class="text-red-500">{{$i}}</a>
                @endfor
            </p>
        </div>
    </div>
</form>