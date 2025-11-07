<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagsController;

Route::get('/', [ArticleController::class, 'index'])->name('homepage');

Route::prefix('articoli')->name('articoli.')->group(function () {
    Route::get('create', [ArticleController::class, 'create'])->name('create');
    Route::post('/', [ArticleController::class, 'store'])->name('store');
    Route::get('{article}', [ArticleController::class, 'show'])->name('show');
    Route::get('{article}/edit', [ArticleController::class, 'edit'])->name('edit');
    Route::put('{article}', [ArticleController::class, 'update'])->name('update');
    Route::delete('{article}', [ArticleController::class, 'destroy'])->name('destroy');
});

Route::prefix('tags')->name('tags.')->group(function () {
    Route::get('/', [TagsController::class, 'index'])->name('index');
    Route::get('create', [TagsController::class, 'create'])->name('create');
    Route::post('/', [TagsController::class, 'store'])->name('store');
});