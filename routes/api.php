<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::post('/user/register', [UserController::class, 'register']);
Route::prefix('/categories')
    ->controller(CategoriesController::class)
    ->group(function (){
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
