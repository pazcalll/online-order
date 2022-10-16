<?php

use App\Http\Controllers\MainController;
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
    return view('index');
});

Route::post('save-calculation', [MainController::class, 'saveCalculation'])->name('save-calculation');
Route::get('get-calculation', [MainController::class, 'getCalculation'])->name('get-calculation');
Route::get('get-all-history', [MainController::class, 'getAllHistory'])->name('get-all-history');
Route::get('get-history-page', [MainController::class, 'getHistoryPage'])->name('get-history-page');
Route::get('get-home-page', [MainController::class, 'getHomePage'])->name('get-home-page');