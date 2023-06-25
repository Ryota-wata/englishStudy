<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\StaticPageController@top');
Route::get('/word/quiz', 'App\Http\Controllers\WordController@quiz')->name('word.quiz');
Route::get('/word/quiz/check', 'App\Http\Controllers\WordController@check')->name('word.check');
Route::post('/word/quiz/check', 'App\Http\Controllers\WordController@check')->name('word.check');

Route::get('/sentence/quiz', 'App\Http\Controllers\SentenceController@quiz')->name('sentence.quiz');
Route::get('/sentence/quiz/check', 'App\Http\Controllers\SentenceController@check')->name('sentence.check');
Route::post('/sentence/quiz/check', 'App\Http\Controllers\SentenceController@check')->name('sentence.check');

Route::get('/word', 'App\Http\Controllers\WordController@index')->name('word.index');
Route::get('/sentence', 'App\Http\Controllers\SentenceController@index')->name('sentence.index');

Route::resource('word', 'App\Http\Controllers\WordController');
Route::resource('user', 'App\Http\Controllers\UserController');
Route::resource('sentence', 'App\Http\Controllers\SentenceController');

Auth::routes();





