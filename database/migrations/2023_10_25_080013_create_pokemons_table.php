<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->integer('pokedex_number');
            $table->string('name');
            $table->string('classification');
            $table->integer('base_total');
            $table->integer('capture_rate');
            $table->integer('coins');
            $table->string('image');
            $table->string('type_1');
            $table->string('type_2');
            $table->string('abilities');
            $table->integer('hp')->nullable();
            $table->integer('speed')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('generation');
            $table->boolean('is_legendary');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};
