<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'homeAuctions']);

Route::get('/history', function () {
    return view('history');
});

Route::get('/new', function () {
    return view('newAuction');
});

Route::get('/auction', function () {
    return view('auction');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/history', function () {
    return view('history');
});

Route::get('/wallet', function () {
    return view('wallet');
});

Route::get('/verification', function () {
    return view('verification');
});
