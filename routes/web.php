<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagsController;

Route::get('/', [ArticleController::class, 'index'])->name('homepage');
Route::post('articoli/articoli/store', [ArticleController::class, 'store'])->name('articoli.store');
Route::put('articoli/articoli.update/{articolo}', [ArticleController::class, 'update'])->name('articoli.update');
Route::delete('articoli/articoli.destroy/{articolo}', [ArticleController::class, 'destroy'])->name('articoli.destroy');
Route::get('articoli/articoli.create', [ArticleController::class, 'create'])->name('articoli.create');
Route::get('articoli/articoli.edit/{articolo}', [ArticleController::class, 'edit'])->name('articoli.edit');
Route::get('articoli/articoli.detail/{articolo}', [ArticleController::class, 'show'])->name('articoli.detail');

Route::get('tags/tags.create', [TagsController::class, 'create'])->name('tags.create');
Route::post('tags/tags/store', [TagsController::class, 'store'])->name('tags.store');
Route::get('tags/index', [TagsController::class, 'index'])->name('tags.index');