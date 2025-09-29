<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Main;
use App\Http\Controllers\Admin\Main as AdminMain;
use App\Http\Controllers\Admin\Category as AdminCategory;
use App\Http\Controllers\Admin\Tag as AdminTag;
use App\Http\Controllers\Admin\Post as AdminPost;
use App\Http\Controllers\Admin\User as AdminUser;

Route::name('main.')->group(function () {
    Route::get('/', Main\IndexController::class)->name('index');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified'])->group(function() {
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

    Route::prefix('posts')->name('post.')->group(function () {
       Route::get('/', AdminPost\IndexController::class)->name('index');
       Route::get('/create', AdminPost\CreateController::class)->name('create');
       Route::post('/', AdminPost\StoreController::class)->name('store');
       Route::get('/{post}', AdminPost\ShowController::class)->name('show');
       Route::get('/{post}/edit', AdminPost\EditController::class)->name('edit');
       Route::patch('/{post}', AdminPost\UpdateController::class)->name('update');
       Route::delete('/{post}', AdminPost\DeleteController::class)->name('delete');
    });

    Route::prefix('uesrs')->name('user.')->group(function () {
        Route::get('/', AdminUser\IndexController::class)->name('index');
        Route::get('/create', AdminUser\CreateController::class)->name('create');
        Route::post('/', AdminUser\StoreController::class)->name('store');
        Route::get('/{user}', AdminUser\ShowController::class)->name('show');
        Route::get('/{user}/edit', AdminUser\EditController::class)->name('edit');
        Route::patch('/{user}/edit-name', AdminUser\UpdateNameController::class)->name('updateName');
        Route::patch('/{user}/edit-email', AdminUser\UpdateEmailController::class)->name('updateEmail');
        Route::patch('/{user}/edit-password', AdminUser\UpdatePasswordController::class)->name('updatePassword');
        Route::patch('/{user}/edit-role', AdminUser\UpdateRoleController::class)->name('updateRole');
        Route::delete('/{user}', AdminUser\DeleteController::class)->name('delete');
    });
});

Auth::routes(['verify' => true]);
