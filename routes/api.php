<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\GenreController;
use App\Http\Controllers\API\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/categories', [CategoryController::class, 'getCategories']);
Route::post('/genres', [GenreController::class, 'getGenres']);

Route::post('/movies', [MovieController::class, 'getMovies']);
Route::post('/movies', [MovieController::class, 'getMovies']);
Route::post('/movie/show/{id}', [MovieController::class, 'getMovie']);

Route::post('/category/{id}', [MovieController::class, 'getMovieByCategory']);
Route::post('/actor/{id}', [MovieController::class, 'getMovieByActor']);
Route::post('/genre/{id}', [MovieController::class, 'getMovieByGenre']);
Route::post('/producer/{id}', [MovieController::class, 'getMovieByProducer']);
Route::post('/country/{id}', [MovieController::class, 'getMovieByCountry']);
