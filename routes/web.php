<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\FrontController;
use App\Http\Middleware\RandomMiddleware;
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
    // We should get logged in User name
    $name = "Zid";
    $number = 5;

    $html = "<b>HTML</b>";

    return view('greeting', compact('name', 'number', 'html'));

    // return view('greeting', ['name' => $name]);
});

// Route::get('/user', [UserController::class, 'index']);

// Route::get('/user/create', [UserController::class, 'create']);

// Route::post('/user/create', [UserController::class, 'store']);

Route::get('users/{name}', function (string $name) {
    return "Hello From User $name";
});

Route::view('/contact', 'contact');


Route::get('blogs', function () {
    return view('blogs');
});

Route::get('about', function () {
    return view('about');
});

Route::get('contact', [FrontController::class, 'contact'])->middleware(RandomMiddleware::class);

Route::get('test-db', [FrontController::class, 'test_db']);
Route::get('test-model', [FrontController::class, 'test_model']);


Route::get('flights', [FlightController::class, 'index']);
Route::get('flights/create', [FlightController::class, 'create']);
Route::post('flights/store', [FlightController::class, 'store']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
