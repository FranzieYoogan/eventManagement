<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/logout', function () {
    return view('logout');
});

Route::get('/createevent', function () {
    return view('createevent');
});

Route::get('/allevents', function () {
    return view('allevents');
});




Route::POSt('/', [Controller::class, 'login']);

Route::POSt('/dashboard', [Controller::class, 'search']);

Route::POSt('/createevent', [Controller::class, 'createEvent']);

Route::get('/logout', [Controller::class, 'logout']);

Route::get('/allevents', [Controller::class, 'allEvents']);


