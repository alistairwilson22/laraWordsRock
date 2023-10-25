<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';
    protected $cast=['abilities'=>'array'];

    public $timestamps = false;

    public function users(){
        return $this->belongsToMany(User::class, 'user_pokemon')->withPivot('user_id');
    }

}
