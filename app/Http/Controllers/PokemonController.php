<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PokemonController extends Controller
{
    public function pokedex() 
    {
        $filters = request(['type', 'generation', 'search']);
        $pokemon = Pokemon::orderBy('id')->filter($filters)->get();
        return view('pokemon.index', compact('pokemon'));
    }

    public function user_pokedex($id) 
    {
        $user = User::find($id);
        $pokemon = Pokemon::where('generation', 1)->orderBy('pokedex_number')->get();
        return view('pokemon.users', compact('pokemon', 'user'));
    }

    public function buy($id) 
    {
        $user = Auth::user();
        $pokemon = Pokemon::find($id);

        if($user->coins_remaining > $pokemon->coins) {
            $user->coins_remaining -= $pokemon->coins;
            $user->pokemons()->attach($pokemon->id);
            $user->save();
            return back()->with('message', 'Successfully bought pokemon');
         } else {
            return back()->withErrors('Not enough money!');

         }

    }
}
