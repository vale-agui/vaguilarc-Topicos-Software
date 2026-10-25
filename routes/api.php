<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProductApiControllerV2;
use App\Http\Controllers\Api\ProductApiControllerV3;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [ProductApiController::class, 'index'])
    ->name('api.product.index');

Route::get('/products/{id}', [ProductApiController::class, 'show'])
    ->name('api.product.show');


Route::get('/v2/products', [ProductApiControllerV2::class, 'index'])
    ->name('api.v2.product.index');

Route::get('/v2/products/{id}', [ProductApiControllerV2::class, 'show'])
    ->name('api.v2.product.show');

Route::get('/v3/products', [ProductApiControllerV3::class, 'index'])
    ->name('api.v3.product.index');

Route::get('/v3/products/paginate', [ProductApiControllerV3::class, 'paginate'])
    ->name('api.v3.product.paginate');

Route::post('/products', [ProductApiController::class, 'store'])
    ->name('api.product.store');