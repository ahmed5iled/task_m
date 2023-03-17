<?php

use App\Http\Controllers\Dashboard\AuthenticationController;
use App\Http\Controllers\Dashboard\BrandsController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\SlidersController;
use App\Http\Controllers\Website\HomeController;
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

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::group(['prefix' => 'login'], function () {
        Route::get('/', [AuthenticationController::class, 'index'])->name('auth.index');
        Route::post('/', [AuthenticationController::class, 'login'])->name('auth.login');
    });

    Route::get('/home', [AuthenticationController::class, 'show'])->name('index');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');

    Route::resource('categories', CategoriesController::class)->except('show');
    Route::get('categories/show', [CategoriesController::class, 'show'])->name('categories.show');

    Route::resource('products', ProductsController::class)->except('show');
    Route::get('products/show', [ProductsController::class, 'show'])->name('products.show');

    Route::resource('brands', BrandsController::class)->except('show');
    Route::get('brands/show', [BrandsController::class, 'show'])->name('brands.show');

    Route::resource('sliders', SlidersController::class)->except('show');
    Route::get('sliders/show', [SlidersController::class, 'show'])->name('sliders.show');
});

Route::group(['prefix' => '/', 'as' => 'website.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
});
