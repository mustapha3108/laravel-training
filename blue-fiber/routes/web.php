<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\mymid;
use App\Models\{Anouncement, Product};

Route::get('/', function () {
    $an = Anouncement::findOrFail(1);
    $an = $an->announcement;
    return view('welcome', ['an'=>$an]);
})->name('welcome');

Route::get('/adminlog', function () {
    return view('adminpages.adminlog');
})->name('adminlog');

Route::get('/admin', function(){
    return view('adminpages.admin');
})->name('admin')->middleware(mymid::class);

Route::get('/upload', function(){
    return view('adminpages.upload');
})->name('upload')->middleware(mymid::class);

Route::get('/update', function(){
    return view('adminpages.update');
})->name('update')->middleware(mymid::class);

Route::get('/orders', function(){
    return view('adminpages.orders');
})->name('orders')->middleware(mymid::class);

Route::get('/announce', function(){
    return view('adminpages.announce');
})->name('announce')->middleware(mymid::class);

Route::get('/update/{id}', function($id){
    $shirt = Product::findOrFail($id);
    return view('adminpages.edit', ['shirt'=>$shirt]);
})->name('edit')->middleware(mymid::class);
