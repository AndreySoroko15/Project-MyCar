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

Route::get('/', App\Http\Controllers\HomePageController::class)->name('web.main.index');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', App\Http\Controllers\HomeController::class)->name('admin.main.index');
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::resource('color', App\Http\Controllers\ColorController::class);
    Route::resource('brand', App\Http\Controllers\BrandController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('cars', App\Http\Controllers\CarsController::class);
});

// Route::middleware(['auth'])->group(function () {
// });



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

