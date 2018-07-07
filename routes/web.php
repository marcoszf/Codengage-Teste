<?php

Route::get('/', function () {
    return view('app.home');
});

Route::resource('people', 'PeopleController');
Route::resource('product', 'ProductController');
Route::resource('order', 'OrderController');