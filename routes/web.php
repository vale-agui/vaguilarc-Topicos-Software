<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

// Página Home
Route::get('/', [HomeController::class, 'index'])
    ->name('home.index');

// Página About
Route::get('/about', function () {
    $data1 = 'About us - Online Store';
    $data2 = 'About us';
    $description = 'This is an about page ...';
    $author = 'Developed by: Valentina Aguilar';

    return view('home.about')
        ->with('title', $data1)
        ->with('subtitle', $data2)
        ->with('description', $description)
        ->with('author', $author);
})->name('home.about');

// Mostrar todos los productos
Route::get('/products', [ProductController::class, 'index'])
    ->name('product.index');

// Mostrar el formulario para crear un producto
Route::get('/products/create', [ProductController::class, 'create'])
    ->name('product.create');

// Recibir y validar los datos del formulario
Route::post('/products/save', [ProductController::class, 'save'])
    ->name('product.save');

// Mostrar un producto particular
Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('product.show');