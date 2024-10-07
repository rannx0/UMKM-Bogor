<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminManageController;
use App\Http\Controllers\RegisterUMKMController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KabupatenKotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\UmkmCategoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonalDataController;
use App\http\Controllers\UsahaController;

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

// Login Routes
Route::get('/gw5t', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'LoginUser'])->name('login.user');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//RegisterForm
Route::get('/get-locations/{type}/{id}', [LocationController::class, 'getLocations']);
Route::post('/check-step-{step}', [RegistrationController::class, 'checkStep'])->name('check-step');
Route::post('/register/finish', [RegistrationController::class, 'finishRegistration'])->name('registration.finish');
Route::get('/register', [RegistrationController::class, 'showForm'])->name('registration.showForm');
// Halaman sukses
Route::get('/register/success', [RegistrationController::class, 'SuccessForm']);

// Halaman frontend dashboard yang bisa diakses oleh siapa saja
Route::get('/', function () {
    return view('frontend.dashboard');
})->name('home');

Route::get('/success', function () {
    return view('frontend.register.success');
})->name('success');

// Superadmin Routes - Only accessible by users with 'Superadmin' role
Route::prefix('superadmin')->middleware(['auth', 'role:Superadmin'])->group(function () {
    Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
    
    // Admin Management (CRUD for Admins)
    Route::get('/admins', [AdminManageController::class, 'index'])->name('admins.index');
    Route::get('/admins/create', [AdminManageController::class, 'create'])->name('admins.create');
    Route::post('/admins', [AdminManageController::class, 'store'])->name('admins.store');
    Route::get('/admins/{admin}/edit', [AdminManageController::class, 'edit'])->name('admins.edit');
    Route::put('/admins/{admin}', [AdminManageController::class, 'update'])->name('admins.update');
    Route::delete('/admins/{admin}', [AdminManageController::class, 'destroy'])->name('admins.destroy');

    // Permissions Management
    Route::get('/permissions', [AdminManageController::class, 'listPermissions'])->name('permissions.index');

    // Locations Manage
    Route::get('/lokasi', [LocationsController::class, 'index'])->name('lokasi');
    Route::resource('provinsi', ProvinsiController::class);
    Route::resource('kabupaten_kota', KabupatenKotaController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('kelurahan', KelurahanController::class);

    // UMKM Category
    Route::resource('umkm-categories', UmkmCategoryController::class);

    // User list
    Route::get('users', [UserController::class, 'index'])->name('users.list');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Usaha list
    Route::get('usaha', [UsahaController::class, 'index'])->name('usaha.list');

    // Personal data list
    Route::get('personal-data', [PersonalDataController::class, 'index'])->name('personal_data.list');
    Route::get('personal-data/{id}', [PersonalDataController::class, 'show'])->name('personal_data.show');
});

// Manager Routes - Only for 'Manager' role
Route::prefix('manager')->middleware(['auth', 'role:Manager'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('manager.dashboard');
});

// Administrator Routes - Only for 'Administrator' role
Route::prefix('administrator')->middleware(['auth', 'role:Administrator'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('administrator.dashboard');
});

// CEO Routes - Only for 'CEO' role
Route::prefix('ceo')->middleware(['auth', 'role:CEO'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('ceo.dashboard');
});

// UMKM Management Routes - Only for 'UMKM Management' role
Route::prefix('umkm-management')->middleware(['auth', 'role:UMKM Management'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('umkm-management.dashboard');
});

// Configurations Management Routes - Only for 'Configurations Management' role
Route::prefix('config-management')->middleware(['auth', 'role:Configurations Management'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('config-management.dashboard');
});