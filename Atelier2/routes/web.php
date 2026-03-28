<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

Route::get('/produits', [ProduitController::class, 'index'])
     ->name('produits.index');

Route::post('/produits', [ProduitController::class, 'store'])
     ->name('produits.store'); 

