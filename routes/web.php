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
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\DatatableUmkmController;
use App\http\Controllers\DashboardFrontendController;
use App\http\Controllers\ConfigurationControllers;
use App\Http\Controllers\HeroContentController;
use App\http\Controllers\AboutUsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;

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
Route::get('/', [DashboardFrontendController::class, 'index'])->name('home');

Route::get('/data-umkm', [DatatableUmkmController::class, 'umkmdatatable'])->name('data-umkm');
Route::get('/data-umkm/{nama_kecamatan}/{id}', [DatatableUmkmController::class, 'showKecamatanUmkm'])->name('kecamatan.umkm');
Route::get('/data-umkm/{nama_kecamatan}/{nama_usaha}/{id}', [DatatableUmkmController::class, 'showUmkmDetail'])->name('detail.umkm');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/propil', function () {
    return view('frontend.pages.data-umkm.umkm-profile');
});

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
    Route::get('usaha/{id}', [UsahaController::class, 'detail'])->name('usaha.show');

    // Personal data list
    Route::get('personal-data', [PersonalDataController::class, 'index'])->name('personal_data.list');
    Route::get('personal-data/{id}', [PersonalDataController::class, 'show'])->name('personal_data.show');

    // User Data
    Route::get('/userdata', [UserDataController::class, 'index'])->name('userdata.index');
    Route::get('/userdata/{id}', [UserDataController::class, 'show'])->name('userdata.show');
    Route::get('/userdata/{id}/personal', [UserDataController::class, 'showPersonalData'])->name('userdata.personalData');
    Route::get('/userdata/{id}/usaha', [UserDataController::class, 'showUsaha'])->name('userdata.usaha');
    Route::get('/userdata/{id}/keuangan', [UserDataController::class, 'showKeuangan'])->name('userdata.keuangan');

    // Configurations
    Route::get('/configuration/{id?}', [ConfigurationControllers::class, 'index'])->name('configuration.index');
    Route::post('/configuration', [ConfigurationControllers::class, 'store'])->name('configuration.store');

    // Hero Content
    Route::get('/hero-content', [HeroContentController::class, 'index'])->name('hero.index');
    Route::post('/hero-content', [HeroContentController::class, 'store'])->name('hero.store');

    // About Us
    Route::get('/about-us', [AboutUsController::class, 'index'])->name('about.index');
    Route::post('/about-us', [AboutUsController::class, 'store'])->name('about.store');

    // FAQ
    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('/faqs/{id}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('/faqs/{id}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/{id}', [FaqController::class, 'destroy'])->name('faqs.destroy');


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