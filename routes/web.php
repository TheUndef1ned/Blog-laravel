<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [IndexController::class, '__invoke']);
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Main\IndexController::class, '__invoke']);
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Category\IndexController::class, '__invoke'])->name('admin.categories.index');
        Route::get('/create', [App\Http\Controllers\Admin\Category\CreateController::class, '__invoke'])->name('admin.categories.create');
    });
});

Auth::routes();


