<?php

use App\Http\Controllers\HeadController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\UserController;
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

Route::post('/login', [UserController::class, 'login']);

Route::get('/index', [PartnerController::class, 'index']);

Route::middleware(['auth:api'])->group(function () {
    Route::post('/store', [PartnerController::class, 'store']);
    Route::post('/update/{head}', [PartnerController::class, 'update']);
    Route::delete('/destroy/{partner}', [PartnerController::class, 'destroy']);

    Route::post('/updatehead/{head}', [HeadController::class, 'update']);

});

