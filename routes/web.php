<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
//
//Route::get('/hello', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth', 'web']], function() {
    // uses 'auth' middleware plus all middleware from $middlewareGroups['web']
    Route::get('/user',[UserController::class, 'index']); //Make a CRUD controller
    Route::get('/weather',[WeatherController::class, 'index']);
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
