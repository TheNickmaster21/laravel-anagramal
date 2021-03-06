<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnagramController;
use App\Http\Controllers\WordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/words', WordController::class);

Route::get('/anagrams/{word}', [AnagramController::class, 'show']);

Route::get('phpinfo', function() {
    return response()->json([
     'info' => phpinfo()
    ]);
 });