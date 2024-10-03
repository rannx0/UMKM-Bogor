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
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register Routes
Route::prefix('register')->group(function () {

    //submit
    Route::post('/submit-final-step', [RegisterUMKMController::class, 'submitFinalStep'])->name('submit.final.step');

    Route::get('/umkm', [RegisterUMKMController::class, 'showForm'])->name('umkm-register');
    Route::post('/step', [RegisterUMKMController::class, 'handleStep'])->name('handle-step');
    Route::post('/step/1', [RegisterUMKMController::class, 'handleAccountStep'])->name('account-step');
    Route::post('/step/2', [RegisterUMKMController::class, 'handlePersonalDataStep'])->name('personal-data-step');
    Route::post('/step/3', [RegisterUMKMController::class, 'handleUmkmDataStep'])->name('umkm-data-step');
    
});

// Register Locations
Route::get('/get-kabupaten-kota', [RegisterUMKMController::class, 'getKabupatenKota'])->name('get.kabupaten.kota');
Route::get('/get-kecamatan', [RegisterUMKMController::class, 'getKecamatan'])->name('get.kecamatan');
Route::get('/get-kelurahan', [RegisterUMKMController::class, 'getKelurahan'])->name('get.kelurahan');


// Halaman frontend dashboard yang bisa diakses oleh siapa saja
Route::get('/', function () {
    return view('frontend.dashboard');
})->name('home');

// Route::get('/register-desain', function () {
//     return view('frontend.pages.register.multi-step-register');
// })->name('regis');

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