<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;

class WordSeeder extends Seeder
{
    /**
     * Seed the application's database with all the words
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Word::truncate();

        $fh = fopen('word_list.txt','r');
        while ($word = fgets($fh)) {
            $letters = str_split($word);
            sort($letters);
            $lettersSorted = implode($letters); 

            try {
                \App\Models\Word::create([
                    'word' => $word,
                    'letters_sorted' => $lettersSorted
                ]);
            } catch(Exception $e){
                //noop (bad word)
            }

        }
        fclose($fh);
    }
}
