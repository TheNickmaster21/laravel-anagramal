<?php

namespace App\Http\Controllers;

use App\Models\Word;

class AnagramController extends Controller
{
    /**
     * Display the anagrams for a given word
     *
     * @return \Illuminate\View\View
     */
    public function show(string $word)
    {
        $word = preg_replace("/[^A-Za-z0-9 ]/", "", $word);

        $letters = str_split(strtolower($word));
        sort($letters);
        $sortedLetters = implode($letters);

        $data = Word::where('letters_sorted', 'like', $sortedLetters)
            ->where('word', '!=', $word)
            ->orderBy('word')
            ->paginate(10);
    
        return view('anagrams.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
