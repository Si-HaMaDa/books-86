<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;



Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {

    // admin
    Route::view('/', 'admin.index')->name('index');

    Route::controller(CategoryController::class)
        ->prefix('categories')
        ->name('categories.')
        // ->middleware('auth')
        ->group(function () {

            // admin/categories
            Route::get('/', 'index')->name('index'); // admin.categories.index
            Route::get('create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
        });

    // Route::resource('categories', CategoryController::class);
});
