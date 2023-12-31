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

Route::get('/', [App\Http\Controllers\Web\ProductController::class, 'index'])->name('web.main.index');
Route::get('/cars', [App\Http\Controllers\Web\ProductController::class, 'allCars'])->name('web.main.allCars');
Route::get('/search', [App\Http\Controllers\Web\ProductController::class, 'search'])->name('search');

Route::get('/car/{id}-{brand_name}-{model}-{year}', [App\Http\Controllers\Web\ProductCardController::class, 'index'])->name('cardProduct');

Route::get('/favorites', [App\Http\Controllers\Web\FavoritesController::class, 'index'])->name('web.favorites');
Route::post('/delete-fav-car-{id}', [App\Http\Controllers\Web\FavoritesController::class, 'deleteFavCar'])->name('deleteFavCar');
Route::get('/fav-cars-count', [App\Http\Controllers\Web\FavoritesController::class, 'countFavCars'])->name('fav-cars-count');

Route::resource('call-request-form', App\Http\Controllers\CallRequestController::class);

Route::post('/{product}/likes', [App\Http\Controllers\LikeController::class, 'index'])->name('like');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\HomeAdminController::class, 'index'])->name('admin.main.index');
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::resource('color', App\Http\Controllers\ColorController::class);
    Route::resource('brand', App\Http\Controllers\BrandController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('cars', App\Http\Controllers\CarsController::class);
    Route::resource('bodyType', App\Http\Controllers\BodyTypeController::class);
    Route::resource('driveSystem', App\Http\Controllers\DriveSystemController::class);
    Route::resource('engineType', App\Http\Controllers\EngineTypeController::class);
    Route::resource('transmissionType', App\Http\Controllers\TransmissionTypeController::class);
    Route::resource('call-request', App\Http\Controllers\CallRequestController::class);
});

// Route::middleware(['auth'])->group(function () {
// });



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

