<?php

use App\Http\Controllers\API\AuctionItemController;
use App\Http\Controllers\API\BidController;
use App\Http\Controllers\API\RoleChangeController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\SubmitAuctionController;
use App\Http\Controllers\API\PurchasesController;
use App\Http\Controllers\API\TempAuctionController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\WalletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//USER
Route::get('/user/{id}', [UserController::class, 'show']);


//ACCOUNTS
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::post('/edit', [RegisterController::class, 'edit']);

Route::post('/logout', [AuthenticatedSessionController::class, 'logout']);

Route::post('/card',[WalletController::class, 'registerCard']);
Route::delete('/card/{id}',[WalletController::class, 'deleteCard']);
Route::post('/bid', [BidController::class, 'bid']);
Route::get('/role-request/{id}', [RoleChangeController::class, 'show']);
Route::post('/role-change/{id}', [RoleChangeController::class, 'update']);
Route::post('/role-change/{id}/{role}', [RoleController::class, 'requestRole']);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/auction/{id}', [SubmitAuctionController::class, 'show']);

Route::post('/auction/{id}/authentication', [AuctionItemController::class, 'authentication']);
Route::post('/launch-auction/{id}', [TempAuctionController::class, 'launchAuction']);

//AUCTION
Route::post('/new-auction', [SubmitAuctionController::class, "post"]);

//ROLE REQUESTS
Route::get('/role-request/{id}', [RoleChangeController::class, 'show']);
Route::post('/role-change/{id}', [RoleChangeController::class, 'update']);
Route::post('/role-change/{id}/{role}', [RoleController::class, 'requestRole']);

//BIDS
Route::post('/bid', [BidController::class, 'bid']);
Route::get('/highest-bid/{auctionItemId}', [BidController::class, 'highestBid']);