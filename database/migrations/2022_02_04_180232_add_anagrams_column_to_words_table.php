<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddAnagramsColumnToWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('words', function (Blueprint $table) {
            $table->integer('anagrams')->index();
        });

        DB::table('words')->update(
            ['anagrams' => DB::raw('(SELECT c FROM (SELECT COUNT(*) - 1 AS c FROM words w WHERE words.letters_sorted = w.letters_sorted) sub)')]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('words', function (Blueprint $table) {
            $table->dropColumn('anagrams');
        });
    }
}
