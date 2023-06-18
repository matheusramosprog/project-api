<?php

use App\Http\Controllers\V1\UserController;
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

Route::group(['prefix' => 'v1'], function () {
    // Route::group(['middleware' => ['externalAuth']], function () {
    //     Route::get('expenses', [Controller::class, 'test'])->name('expenses');
    // });
    //Route::get('user', [UserController::class, 'index'])->name('user');
    Route::apiResource('user', UserController::class);
});

Route::get('/eee', function () {
    return 'opa';
});

Route::get('/', function () {
    return 'opa';
});
