<?php

namespace App\Http\Controllers;

use App\Models\Word;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Word::orderBy('word')->paginate(10);
    
        return view('words.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
