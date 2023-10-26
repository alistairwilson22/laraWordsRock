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

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('abilities', 'like', '%' . request('search') . '%')
                ->orWhere('type_1', 'like', '%' . request('search') . '%')
                ->orWhere('type_2', 'like', '%' . request('search') . '%')
                ->orWhere('classification', 'like', '%' . request('search') . '%')
                ->orWhere('id', 'like', request('search'));
        }

        if($filters['generation'] ?? false) {
            $query->where('generation', 'like', request('generation'));
        } else {
            $query->where('generation', 'like', 1);
        }

        return $query;
    }

}
