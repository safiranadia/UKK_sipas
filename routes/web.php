<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Siswa\ReportController;

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

Route::get('/', function () {
    return view('user.pages.home');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// routes/web.php - Admin Chat Routes

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

});

// routes/web.php - Siswa Report Routes
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/home', [ReportController::class, 'index'])->name('siswa.home');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
    // Tambahkan route lain untuk laporan jika diperlukan
});