<x-layout.layout>
    <div class="bg-gray-50 rounded max-w-lg mx-auto mt-6 mb-6 text-black">
        <header class="text-center bg-sky-700 p-4">
            <h2 class="text-2xl font-bold uppercase mb-1 text-white">
                Are you ready to play?
            </h2>
        </header>
        <div class="text-center">
            <form action="/user/say" method="POST">
                @csrf
                <button 
                    type="submit"
                    class="bg-laravel rounded bg-green-700 text-white p-4 mt-2">
                    <i class="fa-solid fa-comment"></i> Say Word
                </button>
            </form>
            <p class="text-grey-200">{{auth()->user()->next_word}}</p>
            @if(session()->has('message'))
            <p class="text-red-200">{{session('message')}}</p>
            @endif
            <form action="/user/guess" method="POST" class="m-2 border text-xl">
            @csrf
                <label for="guess">
                <input type="text" name="guess" value="{{old('guess')}}" />
                @error('guess')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </form>
        </div>

    </div>
</x-layout.layout>