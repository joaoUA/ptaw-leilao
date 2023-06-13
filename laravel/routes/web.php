<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\NewAuctionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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

Route::get('/new', [NewAuctionController::class, 'index']);

Route::get('/auction/{id}', [AuctionController::class, 'auction'])->name('auction');
    
Route::get('/profile', [ProfileController::class, 'profile']);

Route::get('/history', function () {
    if(Gate::allows('bidder') || Gate::allows('seller') || Gate::allows('admin'))
        return view('history');
    else
        return Redirect::to('/');
});

Route::get('/wallet', function () {
    if(Gate::allows('bidder') || Gate::allows('seller') || Gate::allows('admin'))
        return view('wallet');
    else
        return Redirect::to('/');
});

Route::get('/verification', function () {
    if(Gate::allows('admin'))
        return view('verification');
    else
        return Redirect::to('/');
});
