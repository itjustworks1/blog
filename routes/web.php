<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Route::get('/',[FrontController::class,'home'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{category}',[FrontController::class,'postsInCategory'])->name('postsInCategory');
