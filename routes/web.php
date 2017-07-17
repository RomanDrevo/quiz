<?php

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
    return view('home');
});


Route::get('/', 'QuizController@index');
Route::get('/get-questions', 'QuizController@getAllQuestions');
Route::post('/create-question', 'QuizController@createNewQuestion');
Route::post('{questionId}/delete', 'QuizController@destroy');

Route::post('/check-answer', 'QuizController@checkTheAnswer');