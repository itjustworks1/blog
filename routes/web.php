<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontController::class,'home'])->name('home');
Route::get('/category/{category}',[FrontController::class,'postsInCategory'])->name('postsInCategory');
Route::get('/',[FrontController::class,'home'])->name('home');
