<?php

use Illuminate\Support\Facades\Route;



Route::view('/', 'livealpine')->name('livealpine');

Route::view('/form', 'form')->name('form');
