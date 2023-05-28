<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

Route::view('admin', 'admin.index');

Route::get('admin/categories', [CategoryController::class, 'index']);
Route::get('admin/categories/create', [CategoryController::class, 'create']);
