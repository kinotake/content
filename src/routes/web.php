<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfirmController;

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

Route::get('/', [ConfirmController::class, 'getHome']);
Route::get('/{old_service}', [ConfirmController::class, 'getOldHome']);
Route::post('/confirm', [ConfirmController::class, 'postConfirm']);
Route::post('/thanks', [ConfirmController::class, 'postThanks']);
