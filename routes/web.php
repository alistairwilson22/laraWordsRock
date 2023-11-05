<?php

use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\PokemonController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::get('/game', function () {
    return view('game.index');
})->name('game.index')->middleware('auth');;

// Game
Route::post('/user/say', [UserController::class, 'sayWord'])->middleware('auth');

Route::post('/user/guess', [UserController::class, 'guessWord'])->middleware('auth');

Route::get('/word/random/{level}', [WordController::class, 'getRandomWord'])->name('randomWord')->middleware('auth');

Route::get('/leaderboard', [UserController::class, 'leaderboard'])->name('leaderboard')->middleware('auth');

Route::get('/pokedex', [PokemonController::class, 'pokedex'])->name('pokedex')->middleware('auth');

// Users
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::post('logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::patch('/users/update/{id}', [UserController::class, 'update']);

Route::get('/pokedex/{id}', [PokemonController::class, 'user_pokedex'])->name('user_pokedex')->middleware('auth');

Route::post('pokemon/{id}/buy', [PokemonController::class, 'buy'])->middleware('auth');