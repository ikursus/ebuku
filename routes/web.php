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

// Route untuk terima data dari order form
Route::get('order/thankyou/{id}', 'OrderController@thankYou')->name('order.thankyou');
// Route untuk paparkan order form
Route::get('order/{book_id}', 'OrderController@create');
// Route untuk terima data dari order form
Route::post('order/{book_id}', 'OrderController@store');

/*
 * Route untuk urus tempahan
 */

// Route paparan senarai tempahan
Route::get('tempahan', 'TempahanController@index')->name('tempahan.index');
// Route papar maklumat tempahan
Route::get('tempahan/{id}', 'TempahanController@show')->name('tempahan.show');

// Route papar borang edit tempahan
Route::get('tempahan/{id}/edit', 'TempahanController@edit')->name('tempahan.edit');

// Route kemaskini maklumat tempahan
Route::patch('tempahan/{id}', 'TempahanController@update')->name('tempahan.update');

// Route delete tempahan
Route::delete('tempahan/{id}', 'TempahanController@destroy')->name('tempahan.destroy');






















