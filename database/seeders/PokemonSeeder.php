<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(storage_path("app/data/pokemon.csv"), "r");

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                Pokemon::create([
                    'id' => $data['0'],
                    'pokedex_number' => $data['0'],
                    'name' => $data['1'],
                    'classification' => $data['2'],
                    'base_total' => $data['3'],
                    'capture_rate' => $data['4'],
                    'coins' => $data['5'],
                    'image' => $data['6'],
                    'type_1' => $data['7'],
                    'type_2' => $data['8'],
                    'abilities' => $data['9'],
                    'hp' => $data['15'],
                    'speed' => $data['16'],
                    'height' => $data['14'],
                    'weight' => $data['17'],
                    'generation' => $data['18'],
                    'is_legendary' => $data['19']
                ]);    

            }

            $firstline = false;

        }

   

        fclose($csvFile);
    }
}
