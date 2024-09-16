<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;


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

// Tampilkan formulir login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('frontend.dashboard');
});

Route::group(['middleware' => ['role:superadmin']], function () {
    Route::get('/superadmin', [SuperadminController::class, 'index'])->name('superadmin.dashboard');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});