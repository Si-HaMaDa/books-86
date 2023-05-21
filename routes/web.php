<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'welcome');


// Route::redirect('/users', '/greeting');


Route::post('greeting', function () {
    return "Hello Form POST";
});

Route::get('greeting', function () {
    return view('greeting');
});

// Route::get('/user', [UserController::class, 'index']);

// Route::get('/user/create', [UserController::class, 'create']);

// Route::post('/user/create', [UserController::class, 'store']);

Route::get('users/{name}', function (string $name) {
    return "Hello From User $name";
});


Route::view('/', 'index');

Route::view('/contact', 'contact');
