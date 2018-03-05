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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return view('pages/home');
})->name('home');

Route::get('/books', 'BooksController@bookslist')->name('books');

Route::resource('manage','BooksController');

Route::get('/search','BooksController@search');
