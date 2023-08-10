<?php

use Illuminate\Support\Facades\Route;

// , 'middleware' => ['admin', 'auth']
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin.index');
    Route::get('/parser', [\App\Http\Controllers\Admin\ParserController::class, 'index'])->name('admin.parser.index');
    Route::post('/parser', [\App\Http\Controllers\Admin\ParserController::class, 'upload'])->name('admin.parser.upload');




    Route::resources([
        'categories' => \App\Http\Controllers\Admin\CategoryController::class,
        'movies' => \App\Http\Controllers\Admin\MovieController::class,
    ]);
});
