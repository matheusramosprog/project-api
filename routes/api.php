<?php

use App\Http\Controllers\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    // Route::group(['middleware' => ['externalAuth']], function () {
    //     Route::get('expenses', [Controller::class, 'test'])->name('expenses');
    // });
    //Route::get('user', [UserController::class, 'index'])->name('user');
    Route::apiResource('user', UserController::class);
});

