<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\NewAuctionController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerificationsController;
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

Route::get('/history/sales', [HistoryController::class, 'showSales']);
Route::get('/history/purchases', [HistoryController::class, 'showPurchases']);

Route::get('/profile', [ProfileController::class, 'profile']);

Route::get('/wallet', [WalletController::class,'wallet']);

Route::get('/verification', [VerificationsController::class, 'verification' ]);
