<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Main;
use App\Http\Controllers\Admin\Main as AdminMain;

Route::name('main.')->group(function () {
    Route::get('/', Main\IndexController::class)->name('index');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', AdminMain\IndexController::class)->name('index');
});

Auth::routes();
