<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function play()
    {
        return redirect('/')->with('message', 'You want to play');
    }

    public function getRandomWord()
    {
        $level = request('level');

        if ($level !== null) {
            $randomWord = Word::where('level', $level)->inRandomOrder()->first();
        } else {
            $randomWord = Word::inRandomOrder()->first();
        }

        return response()->json(['word' => $randomWord->word]);
    }

    public function randomWord($level = null)
    {
        if ($level !== null) {
            $randomWord = Word::where('level', $level)->inRandomOrder()->first();
        } else {
            $randomWord = Word::inRandomOrder()->first();
        }

        return response()->json(['word' => $randomWord->word]);
    }
}
