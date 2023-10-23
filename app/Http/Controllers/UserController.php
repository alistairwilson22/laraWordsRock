<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use App\Models\User;
use App\Models\Word;

use App\Http\Controllers\WordController;

class UserController extends Controller
{
    public function create()
    {
        $levels = Word::distinct()->pluck('level');
        return view('users.register', compact('levels'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'level' => 'required'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'User registered');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        }
    }

    public function sayWord(Request $request)
    {
        $user = Auth::user();

        if ($user && is_null($user->next_word)) {
            $this->nextWord();
            return back()->with("message", "You can start playing now!");
        } else {
            return back()->with("message", "You need to spell this word correctly first.");
        }
    }

    public function guessWord(Request $request)
    {

        $user = Auth::user();
        //dd($request->guess);
        if ($request->guess == $user->next_word) {
            $user->coins += $user->coins_for_next_word;
            $user->coins_for_next_word = 8;
            $user->save();
            $this->nextWord();
            return back()->with("message", "Well done you get coins.");
        } else {
            $user->coins_for_next_word = ceil($user->coins_for_next_word / 2);
            $user->save();
            return back()->with("message", "Sorry you guessed wrong.");
        }
    }

    public function nextWord()
    {
        $user = Auth::user();

        if ($user) {
            $randomWord = Word::where('level', $user->level)->inRandomOrder()->first(); // not happy with this need to move to WordController.
            $user->next_word = $randomWord->word;
            $user->save();
        }
    }
}
