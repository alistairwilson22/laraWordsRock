<!-- Search -->
<form action="/pokedex" method="GET">
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
                <a href="/pokedex?generation=1" class="text-red-500" >1</a>
                <a href="/pokedex?generation=2" class="text-red-500" >2</a>
                <a href="/pokedex?generation=3" class="text-red-500" >3</a>
                <a href="/pokedex?generation=4" class="text-red-500" >4</a>
                <a href="/pokedex?generation=5" class="text-red-500" >5</a>
                <a href="/pokedex?generation=6" class="text-red-500" >6</a>
            </p>
        </div>
    </div>
</form>