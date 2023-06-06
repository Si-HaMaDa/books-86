<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HashtagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'as'     => 'admin.',
], function () {

    // admin
    Route::view('/', 'admin.index')->name('index');

    // Route::controller(CategoryController::class)
    //     ->prefix('categories')
    //     ->name('categories.')
    //     // ->middleware('auth')
    //     ->group(function () {
    //         // admin/categories
    //         Route::get('/', 'index')->name('index'); // admin.categories.index
    //         Route::get('create', 'create')->name('create');
    //         Route::post('/', 'store')->name('store');
    //         Route::get('/{id}', 'show')->name('show');
    //         Route::get('/{id}/edit', 'edit')->name('edit');
    //         Route::put('/{id}', 'update')->name('update');
    //         Route::delete('/{id}', 'destroy')->name('destroy');
    //     });

    // Route::resource('categories', CategoryController::class);

    Route::resources([
        'categories' => CategoryController::class,
        'hashtags'   => HashtagController::class,
        'books'      => BookController::class,
        'users'      => UserController::class,
    ]);
});
