<?php

use App\Http\Controllers\SectorsController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome'); });

Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');

Route::get('/sectors', [SectorsController::class, 'create'])->middleware(['auth'])->name('sectors');
Route::post('/sectors', [SectorsController::class, 'store'])->middleware(['auth'])->name('sectors');
Route::get('/sectors', [SectorsController::class, 'show'])->middleware(['auth'])->name('sectors');
Route::get('/sectors/edit/{id?}', [SectorsController::class, 'edit'])->middleware(['auth'])->name('sectors');
Route::put('/sectors/update/{id?}', [SectorsController::class, 'update'])->middleware(['auth'])->name('sectors');
Route::delete('/sectors/{id?}', [SectorsController::class, 'destroy'])->middleware(['auth'])->name('sectors');

Route::get('/products', [ProductsController::class, 'create'])->middleware(['auth'])->name('products');
Route::post('/products', [ProductsController::class, 'store'])->middleware(['auth'])->name('products');
Route::get('/products/list/{id?}', [ProductsController::class, 'list'])->middleware(['auth']);
Route::get('/products/edit/{id?}/{id_sector?}', [ProductsController::class, 'edit'])->middleware(['auth']);
Route::put('/products/update/{id?}', [ProductsController::class, 'update'])->middleware(['auth']);
Route::delete('/products/{id?}', [ProductsController::class, 'destroy'])->middleware(['auth']);

require __DIR__.'/auth.php';
