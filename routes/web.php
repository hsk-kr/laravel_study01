<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/login', function() {
    return view('login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/quiz', 'QuizController@store')->name('quizzes.store');

Route::get('/lecture', 'LectureController@index')->name('lecture.list');
Route::get('/lecture/create', 'LectureController@create')->name('lecture.create');
Route::post('/lecture/create', 'LectureController@store')->name('lecture.store');

Route::get('/create', 'BlogController@create')->name('blogs.create');
Route::post('/create', 'BlogController@store')->name('blogs.store');
