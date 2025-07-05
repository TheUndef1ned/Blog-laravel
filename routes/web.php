<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [IndexController::class, '__invoke']);
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Main\IndexController::class, '__invoke']);
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.posts.index');
        Route::get('/create', [App\Http\Controllers\Admin\Post\CreateController::class, '__invoke'])->name('admin.posts.create');
        Route::post('/', [App\Http\Controllers\Admin\Post\StoreController::class, '__invoke'])->name('admin.posts.store');
        Route::get('/{post}', [App\Http\Controllers\Admin\Post\ShowController::class, '__invoke'])->name('admin.posts.show');
        Route::get('/{post}/edit', [App\Http\Controllers\Admin\Post\EditController::class, '__invoke'])->name('admin.posts.edit');
        Route::patch('/{post}', [App\Http\Controllers\Admin\Post\UpdateController::class, '__invoke'])->name('admin.posts.update');
        Route::delete('/{post}', [App\Http\Controllers\Admin\Post\DeleteController::class, '__invoke'])->name('admin.posts.delete');

    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Category\IndexController::class, '__invoke'])->name('admin.categories.index');
        Route::get('/create', [App\Http\Controllers\Admin\Category\CreateController::class, '__invoke'])->name('admin.categories.create');
        Route::post('/', [App\Http\Controllers\Admin\Category\StoreController::class, '__invoke'])->name('admin.categories.store');
        Route::get('/{category}', [App\Http\Controllers\Admin\Category\ShowController::class, '__invoke'])->name('admin.categories.show');
        Route::get('/{category}/edit', [App\Http\Controllers\Admin\Category\EditController::class, '__invoke'])->name('admin.categories.edit');
        Route::patch('/{category}', [App\Http\Controllers\Admin\Category\UpdateController::class, '__invoke'])->name('admin.categories.update');
        Route::delete('/{category}', [App\Http\Controllers\Admin\Category\DeleteController::class, '__invoke'])->name('admin.categories.delete');

    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Tag\IndexController::class, '__invoke'])->name('admin.tags.index');
        Route::get('/create', [App\Http\Controllers\Admin\Tag\CreateController::class, '__invoke'])->name('admin.tags.create');
        Route::post('/', [App\Http\Controllers\Admin\Tag\StoreController::class, '__invoke'])->name('admin.tags.store');
        Route::get('/{tag}', [App\Http\Controllers\Admin\Tag\ShowController::class, '__invoke'])->name('admin.tags.show');
        Route::get('/{tag}/edit', [App\Http\Controllers\Admin\Tag\EditController::class, '__invoke'])->name('admin.tags.edit');
        Route::patch('/{tag}', [App\Http\Controllers\Admin\Tag\UpdateController::class, '__invoke'])->name('admin.tags.update');
        Route::delete('/{tag}', [App\Http\Controllers\Admin\Tag\DeleteController::class, '__invoke'])->name('admin.tags.delete');

    });
});

Auth::routes();


