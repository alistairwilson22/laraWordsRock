<x-layout.layout>
    <div class="bg-gray-50 rounded max-w-lg mx-auto mt-6 mb-6 text-black">
        <header class="text-center bg-sky-700 p-4">
            <h2 class="text-2xl font-bold uppercase mb-1 text-white">
                Let's Play!
            </h2>
        </header>
        <div class="text-center">
            
            @if(auth()->user()->next_word)
                <button 
                    type="submit"
                    id="say-word"
                    class="bg-laravel rounded bg-green-700 text-white p-4 mt-4">
                    <i class="fa-solid fa-comment"></i> Say Word
                </button>
                <script>
                    let counter = 3;
                    let speech = new SpeechSynthesisUtterance();
                    speech.lang = "en";
                    voices = window.speechSynthesis.getVoices();
                    speech.rate = 0.8;

                    document.querySelector("#say-word").addEventListener("click", () => {
                        counter += 1;
                        voice_counter = counter % voices.length;
                        speech.voice = voices[voice_counter];
                        speech.text = @json(auth()->user()->next_word);
                        window.speechSynthesis.speak(speech);
                    });
                </script>
            @else
            <form action="/user/say" method="POST">
                @csrf
                <button 
                    type="submit"
                    class="bg-laravel rounded bg-orange-700 text-white p-4 mt-4">
                    <i class="fa-solid fa-play"></i> Let's start
                </button>
            </form>
            @endif            
            
            @if(session()->has('message'))
            <p class="text-orange-400 pt-4">{{session('message')}}</p>
            @endif

            <form action="/user/guess" method="POST" class="m-4 text-xl">
            @csrf
                <label for="guess"></label>
                <input type="text" class="border p-2" name="guess" value="{{old('guess')}}" />
                <input type="submit" value=">" class="p-2 bg-sky-700 text-white ml-0"/>
                @error('guess')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </form>

            @if(auth()->user()->coins_for_next_word < 4)
            <div x-data="{ open: false }" class="m-4 text-slate-400">
                <button @click="open = ! open" @click.outside="open = false">
                    <p x-show="!open"><i class="fa-solid fa-eye"></i> Show word</p>
                    <p x-show="open"><i class="fa-solid fa-eye-slash"></i> <span id="word-to-say" >{{auth()->user()->next_word}}</span></p>
                </button>
             
                <div x-show="open" @click.outside="open = false">
                </div>
            </div>
            @endif

        </div>

    </div>
</x-layout.layout>