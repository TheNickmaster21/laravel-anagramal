<?php

namespace Database\Seeders;

use Exception;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\Word;


class WordSeeder extends Seeder
{
    /**
     * Seed the application's database with all the words
     *
     * @return void
     */
    public function run()
    {
        Word::truncate();

        $fh = fopen('word_list.txt','r');
        while ($word = fgets($fh)) {
            $word = preg_replace("/[^A-Za-z0-9 ]/", "", $word);

            $letters = str_split($word);
            sort($letters);
            $lettersSorted = implode($letters); 

            try {
               Word::create([
                    'word' => $word,
                    'letters_sorted' => $lettersSorted,
                    'anagrams' => 0
                ]);

                DB::table('words')->where('letters_sorted', $lettersSorted)->update(
                    ['anagrams' => DB::raw('(SELECT c FROM (SELECT COUNT(*) - 1 AS c FROM words w WHERE words.letters_sorted = w.letters_sorted) sub)')]
                );
            } catch(Exception $e){
                Log::warning($e);

                Log::warning('Failed to insert ' . $word);
            }
        }
        fclose($fh);
    }
}
