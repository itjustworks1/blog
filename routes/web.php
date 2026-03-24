<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
    //return view('welcome');
});

Auth::routes();


//Route::get('/home',[FrontController::class,'home'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{category}',[FrontController::class,'postsInCategory'])->name('postsInCategory');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [FrontController::class, 'home'])->name('home');
    Route::resource('posts', FrontController::class)->except(['home', 'show']);
    Route::get('/post/{post}', [FrontController::class, 'post'])->name('post');
});
