<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PromotionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//routes pour les catégories
Route::apiResource('categories', CategorieController::class);

//routes pour les promotions
Route::apiResource('promotions', PromotionController::class);

//routes pour les produits
Route::apiResource('produits', ProduitController::class);