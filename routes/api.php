<?php

use App\Http\Controllers\V1\UserController;
use App\Http\Controllers\V1\ExpensesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::group(['middleware' => ['auth:api']], function () {
        Route::apiResource('expenses', ExpensesController::class);
    });
});

Route::post('login', [UserController::class, 'authUser'])->name('login');
