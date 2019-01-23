<?php

Route::get('/', function () {
    return view('welcome');
});

# Route untuk authentication (login/logout/register/password reset)
Auth::routes();

# Route homepage selepas login
Route::get('/home', 'HomeController@index')->name('home');


// Route untuk senarai produk (public view)
Route::get('booklist', function () {

    $ebooks = [
        ['id' => 1, 'title' => 'Ebook 1', 'description' => 'Sample Description'],
        ['id' => 2, 'title' => 'Ebook 2', 'description' => 'Sample Description'],
        ['id' => 3, 'title' => 'Ebook 3', 'description' => 'Sample Description'],
        ['id' => 4, 'title' => 'Ebook 4', 'description' => 'Sample Description'],
        ['id' => 5, 'title' => 'Ebook 5', 'description' => 'Sample Description'],
    ];

    $title = 'Senarai ebook';

    return view('template_booklist', compact('ebooks', 'title'));

});























