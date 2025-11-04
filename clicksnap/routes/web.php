<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\mymid;
use App\Livewire\Browse;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::view('/account', 'account')->name('account')->middleware(mymid::class);
Route::view('/upload', 'upload')->name('upload')->middleware(mymid::class);

Route::get('/browse', function(){
    $query = request('query');
    return view('browsepage', ['query'=>$query]);
})->name('browse');


