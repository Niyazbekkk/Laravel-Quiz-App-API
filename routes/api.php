<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/users')
    ->controller(UserController::class)
    ->group(function (){
        Route::post('/singUp', 'register');
        Route::get('/getMe', 'getMe')->middleware('auth:sanctum');
        Route::post('/logIn', 'logIn');
    });

Route::prefix('/categories')
    ->controller(CategoriesController::class)
    ->group(function (){
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
