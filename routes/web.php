<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('main');

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');

# RUTA RECURSIVA => utilizar except y en array indicar que metodo no mostrar o si es uno en especifico only
Route::resource('products', App\Http\Controllers\ProductController::class); # 

Route::resource('products.cart', App\Http\Controllers\ProductCartController::class)->only(['store','destroy']);

Route::resource('cart',  App\Http\Controllers\CartController::class)->only(['index']);

# RUTAS NORMALES
/* Route::get('products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('products/create',  [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
// Route::get('products/{product:title}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('products/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
Route::match(['put', 'patch'], 'products/{product}',  [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
Route::delete('products/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy'); */




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
