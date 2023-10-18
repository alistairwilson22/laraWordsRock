<x-layout.layout>
    <div class="justify-start">
        <h1>Are you ready to play?</h1>

        <button class="bg-green-500 text-white p-4 mt-2"><i class="fa-solid fa-play"></i> Play Word</button>

        <form action="POST" method="/word/guess">
        @csrf

        </form>
    </div>
</x-layout.layout>