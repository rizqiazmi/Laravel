<?php

use Illuminate\Support\Facades\Route;

// Route::view('/', 'banksampah');

Route::get('/', function () {
    return view('welcome');
});
