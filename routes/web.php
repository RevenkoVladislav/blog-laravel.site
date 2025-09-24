<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Main;
use App\Http\Controllers\Admin\Main as AdminMain;
use App\Http\Controllers\Admin\Category as AdminCategory;
use App\Http\Controllers\Admin\Tag as AdminTag;

Route::name('main.')->group(function () {
    Route::get('/', Main\IndexController::class)->name('index');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', AdminMain\IndexController::class)->name('index');

    Route::prefix('categories')->name('category.')->group(function() {
       Route::get('/', AdminCategory\IndexController::class)->name('index');
       Route::get('/create', AdminCategory\CreateController::class)->name('create');
       Route::post('/', AdminCategory\StoreController::class)->name('store');
       Route::get('/{category}', AdminCategory\ShowController::class)->name('show');
       Route::get('/{category}/edit', AdminCategory\EditController::class)->name('edit');
       Route::patch('/{category}', AdminCategory\UpdateController::class)->name('update');
       Route::delete('/{category}', AdminCategory\DeleteController::class)->name('delete');
    });

    Route::prefix('tags')->name('tag.')->group(function() {
       Route::get('/', AdminTag\IndexController::class)->name('index');
       Route::get('/create', AdminTag\CreateController::class)->name('create');
       Route::post('/', AdminTag\StoreController::class)->name('store');
       Route::get('/{tag}', AdminTag\ShowController::class)->name('show');
       Route::get('/{tag}/edit', AdminTag\EditController::class)->name('edit');
       Route::patch('/{tag}', AdminTag\UpdateController::class)->name('update');
       Route::delete('/{tag}', AdminTag\DeleteController::class)->name('delete');
    });
});

Auth::routes();
