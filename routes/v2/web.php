<?php

use App\Models\UrlLink;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\v2\WelcomeController;

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



Route::name('v2.')->prefix('v2')->group(function(){
    Route::get('/', [WelcomeController::class, 'index'])->name('v1.home');
    Route::post('short_url', [WelcomeController::class, 'shortUrl'])->name('short_url');
});

