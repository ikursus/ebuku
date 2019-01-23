<?php

Route::get('/', function () {
    return view('welcome');
});

# Route untuk authentication (login/logout/register/password reset)
Auth::routes();

# Route homepage selepas login
Route::get('/home', 'HomeController@index')->name('home');


// Route untuk senarai produk (public view)
Route::get('booklist', 'BooklistController@index');

// Route untuk paparkan order form
Route::get('order/{id}', 'OrderController@create');
// Route untuk terima data dari order form
Route::post('order/{id}', 'OrderController@store');






















