<x-layout.layout>
    <div class="mx-4">
        <div class="bg-gray-50 rounded max-w-lg mx-auto mt-6 mb-6">
            <header class="text-center bg-sky-700 p-4">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Profile
                </h2>
            </header>

            <form action="/users/update/{{auth()->user()->id}}" method="POST" class="p-6 text-black">
                @csrf
                @method('PATCH')
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">
                        Name
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name"
                        value="{{auth()->user()->name}}"

                    />

                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2"
                        >Email</label>
                    <input
                        type="email"
                        class="border border-gray-200 bg-slate-200 rounded p-2 w-full"
                        name="email"
                        value="{{auth()->user()->email}}"
                        disabled
                    />

                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="level" class="inline-block text-lg mb-2"
                        >Level</label>
                    <select name="level" class="border border-gray-200 bg-white rounded p-2 w-full" id="level">
                        <option value="{{auth()->user()->level}}">{{auth()->user()->level}}</option>
                        @foreach($levels as $level)
                            <option value="{{ $level }}">{{ $level }}</option>
                        @endforeach
                    </select>

                    @error('level')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-laravel text-white rounded py-2 px-4 bg-black">
                        Update
                    </button>
                </div>

                <div class="mt-8">
                    <p>
                        Want to start playing?
                        <a href="/game" class="text-laravel">Play Now</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-layout.layout>