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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserApprovalController;

use App\Mail\UserApprovedMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/test-email', function () {
    // Temukan user yang akan menerima email (pastikan ID-nya ada di database)
    $user = \App\Models\User::find(38); // Ganti dengan ID user yang valid

    if (!$user) {
        return 'User tidak ditemukan.';
    }

    // Kirim email persetujuan sebagai tes
    Mail::to($user->email)->send(new UserApprovedMail($user));

    return 'Email telah dikirim';
});


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

// Halaman frontend dashboard
Route::get('/', [DashboardFrontendController::class, 'index'])->name('home');

// Datatable UMKM
Route::get('/data-umkm', [DatatableUmkmController::class, 'umkmdatatable'])->name('data-umkm');
Route::get('/data-umkm/{nama_kecamatan}/{id}', [DatatableUmkmController::class, 'showKecamatanUmkm'])->name('kecamatan.umkm');
Route::get('/data-umkm/{nama_kecamatan}/{nama_usaha}/{id}', [DatatableUmkmController::class, 'showUmkmDetail'])->name('detail.umkm');

// Halaman Dashboard Kirim Contact Message
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/propil', function () {
    return view('frontend.pages.data-umkm.umkm-profile');
});
Route::get('/desain-profiluser', function () {
    return view('frontend.pages.user-profile.index');
});

// 'Superadmin' role
Route::prefix('superadmin')->middleware(['auth', 'role:Superadmin'])->group(function () {
    Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
    
    // Admin Manage
    Route::get('/admins', [AdminManageController::class, 'index'])->name('admins.index');
    Route::get('/admins/create', [AdminManageController::class, 'create'])->name('admins.create');
    Route::post('/admins', [AdminManageController::class, 'store'])->name('admins.store');
    Route::get('/admins/{admin}/edit', [AdminManageController::class, 'edit'])->name('admins.edit');
    Route::put('/admins/{admin}', [AdminManageController::class, 'update'])->name('admins.update');
    Route::delete('/admins/{admin}', [AdminManageController::class, 'destroy'])->name('admins.destroy');

    // Permissions Manage
    Route::get('/permissions', [AdminManageController::class, 'listPermissions'])->name('permissions.index');

    // Locations Manage
    Route::get('/lokasi', [LocationsController::class, 'index'])->name('lokasi');
    Route::resource('provinsi', ProvinsiController::class);
    Route::resource('kabupaten_kota', KabupatenKotaController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('kelurahan', KelurahanController::class);

    // UMKM Category
    Route::resource('umkm-categories', UmkmCategoryController::class);

    // // User list
    // Route::get('users', [UserController::class, 'index'])->name('users.list');
    // Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Usaha list
    Route::get('usaha', [UsahaController::class, 'index'])->name('usaha.list');
    Route::get('usaha/{id}', [UsahaController::class, 'detail'])->name('usaha.show');

    // Personal data list
    Route::get('personal-data', [PersonalDataController::class, 'index'])->name('personal_data.list');
    Route::get('personal-data/{id}', [PersonalDataController::class, 'show'])->name('personal_data.show');

    // User Data Routes
    Route::prefix('userdata')->name('userdata.')->group(function () {
        Route::get('/', [UserDataController::class, 'index'])->name('index');
        Route::get('/{id}', [UserDataController::class, 'show'])->name('show');
        Route::get('/{id}/profile', [UserDataController::class, 'showProfile'])->name('profile');
        Route::get('/{id}/personal', [UserDataController::class, 'showPersonalData'])->name('personalData');
        Route::get('/{id}/usaha', [UserDataController::class, 'showUsaha'])->name('usaha');
        Route::get('/{id}/keuangan', [UserDataController::class, 'showKeuangan'])->name('keuangan');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    });
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

    //User Approval
    Route::get('/user-approval/pending', [UserApprovalController::class, 'index'])->name('user-approval.index');
    Route::get('/user-approval/approved', [UserApprovalController::class, 'showApproved'])->name('user-approval.approved');
    Route::get('/user-approval/rejected', [UserApprovalController::class, 'showRejected'])->name('user-approval.rejected');    
    Route::post('/user-approval/{id}/approve', [UserApprovalController::class, 'approve'])->name('user-approval.approve');
    Route::post('/user-approval/{id}/reject', [UserApprovalController::class, 'reject'])->name('user-approval.reject');
    Route::delete('user/{id}', [UserApprovalController::class, 'destroy'])->name('user.destroy');

});

// 'Manager' role 
Route::prefix('manager')->middleware(['auth', 'role:Manager'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('manager.dashboard');
});

// 'User' role
Route::prefix('user')->middleware(['auth', 'role:User'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// 'Administrator' role
Route::prefix('administrator')->middleware(['auth', 'role:Administrator'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('administrator.dashboard');
});

// 'CEO' role
Route::prefix('ceo')->middleware(['auth', 'role:CEO'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('ceo.dashboard');
});

// 'UMKM Management' role
Route::prefix('umkm-management')->middleware(['auth', 'role:UMKM Management'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('umkm-management.dashboard');
});

// 'Configurations Management' role
Route::prefix('config-management')->middleware(['auth', 'role:Configurations Management'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('config-management.dashboard');
});