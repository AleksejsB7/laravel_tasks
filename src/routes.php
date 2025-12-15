<?php

use Illuminate\Support\Facades\Route;
use Testsproject\LaravelTasks\Http\Controllers\PersonController;

Route::middleware('api')
    ->prefix('api')
    ->group(function () {
        Route::get('people', [PersonController::class, 'index']);
        Route::post('people', [PersonController::class, 'store']);
        Route::get('people/{person}', [PersonController::class, 'show']);
        Route::patch('people/{person}', [PersonController::class, 'update']);
        Route::delete('people/{person}', [PersonController::class, 'destroy']);
    });
