<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;

Route::get('/animes/{anime}', [Controllers\AnimeController::class,'show'])->name('anime.show');
Route::get('/animes/query/by', [Controllers\AnimeController::class,'findBy'])->name('anime.findBy');
Route::get('/categories', [Controllers\CategoryController::class,'index'])->name('category.index');
