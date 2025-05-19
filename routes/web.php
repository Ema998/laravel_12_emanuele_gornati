<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticoliController;

Route::get('articoli/index', [PublicController::class, 'homepage'])->name('homepage');
Route::get('articoli//articoli.create', [PublicController::class, 'articoliCreate'])->name('articoli.create');
Route::get('articoli/articoli.detail', [PublicController::class, 'articoliDetail'])->name('articoli.detail');
Route::get('articoli/articoli.edit', [PublicController::class, 'articoliedit'])->name('articoli.edit');
Route::post('articoli/store', [ArticoliController::class, 'articoliStore'])->name('articoli.store');
Route::put('articoli/articoli.update', [ArticoliController::class, 'articoliUpdate'])->name('articoli.update');
Route::delete('articoli/articoli.destroy', [ArticoliController::class, 'articoliDestroy'])->name('articoli.destroy');
Route::get('articoli/articoli.show', [ArticoliController::class, 'articoliShow'])->name('articoli.show');