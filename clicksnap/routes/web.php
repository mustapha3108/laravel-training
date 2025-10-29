<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\mymid;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::view('/account', 'account')->name('account')->middleware(mymid::class);
Route::view('/upload', 'upload')->name('upload')->middleware(mymid::class);

