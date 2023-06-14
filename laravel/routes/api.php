<?php

use App\Http\Controllers\API\BidController;
use App\Http\Controllers\API\RoleChangeController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\SubmitAuctionController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::post('/auction', [SubmitAuctionController::class, "post"]);

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::post('/logout', [AuthenticatedSessionController::class, 'logout']);

Route::post('/bid', [BidController::class, 'bid']);
Route::get('/role-request/{id}', [RoleChangeController::class, 'show']);
Route::post('/role-change/{id}', [RoleChangeController::class, 'update']);
Route::post('/role-change/{id}/{role}', [RoleController::class, 'requestRole']);
Route::get('/user/{id}', [UserController::class, 'show']);
