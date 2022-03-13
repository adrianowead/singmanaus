<?php

use App\Http\Controllers\DashController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [LoginController::class, 'loginViaRemember'])->name('login');

Route::match(['get','post'], '/login', [LoginController::class, 'authenticate']);
Route::match(['get','post'], '/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashController::class, 'index'])->name('dashboard');
    Route::get('/profile/{id?}', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profileUpdate');
});