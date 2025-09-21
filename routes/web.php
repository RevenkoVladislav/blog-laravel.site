<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Main;

Route::name('main.')->group(function () {
    Route::get('/', Main\IndexController::class)->name('index');
});

Auth::routes();
