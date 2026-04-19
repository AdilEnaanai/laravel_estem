<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoueurController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/joueurs', [JoueurController::class, 'index'])->name('joueurs.index');

Route::get('/equipes', function () {
    return view('equipes.equipes');
});

Route::post('/joueurs', [JoueurController::class, 'store'])->name('joueurs.store');
