<?php

namespace Database\Seeders;

use App\Models\Word;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WordCsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Word::truncate();

        $csvFile = fopen(storage_path("app/data/word_list_data.csv"), "r");

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                Word::create([
                    'id' => $data['0'],
                    'word' => $data['1'],
                    'level' => $data['2']
                ]);  

            }

            $firstline = false;

        }

   

        fclose($csvFile);

    }
}
