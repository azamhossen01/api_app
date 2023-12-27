<?php

use App\Http\Controllers\API\v1\UrlLinkController;
use App\Http\Controllers\API\v1\UserController;
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

Route::prefix('v2')->group(function(){
    Route::post('/register', [ UserController::class, 'register' ])->name('register');
    Route::post('/login', [ UserController::class, 'login' ])->name('login');

    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/shorten', [UrlLinkController::class, 'shorten'])->name('shorten');
        Route::get('/list-urls', [UrlLinkController::class, 'listUrl'])->name('list-urls');
    });

});
