<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('main');
});

// Route::get('view-cities', [CityController::class, 'index']);
Route::get('view-posts', [PostController::class, 'index']);

Route::get('fav-post/{id}', [PostController::class, 'addToFav']);
Route::get('fav-remove/{id}', [PostController::class, 'removeFromFav']);
Route::get('favourites', function() {
    return view('favourites');
});

Route::get('compare-post/{id}', [PostController::class, 'addToCompare']);
Route::get('compare-remove/{id}', [PostController::class, 'removeFromCompare']);
// Route::get('compare', function() {
//     return view('compare');
// });
Route::get('compare', [PostController::class, 'compareList']);