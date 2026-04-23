<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Siswa\ReportController;
use App\Http\Controllers\Siswa\ListReportController;
use App\Http\Controllers\Siswa\HistoryReportController;
use App\Http\Controllers\Admin\DashboardConntroller;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\AccountUserController;
use App\Http\Controllers\CustomChatController; 

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
    return view('landing-sipas');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLogin');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
});

Route::post('chatbot', [CustomChatController::class, 'chatbotApi'])->name('api.chatbot');
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/report-comments', [App\Http\Controllers\ReportCommentController::class, 'store'])->name('report-comments.store');
    Route::get('/report-comments/{report_id}', [App\Http\Controllers\ReportCommentController::class, 'index'])->name('report-comments.index');
    
    // Chatbot API
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardConntroller::class, 'index'])->name('dashboard');
    Route::get('/account-siswa', [AccountUserController::class, 'index'])->name('account-siswa');
    Route::post('/account-siswa/store', [AccountUserController::class, 'store'])->name('account.store');
    Route::get('/account-siswa/{id}/edit', [AccountUserController::class, 'edit'])->name('account.edit');
    Route::put('/account-siswa/{id}', [AccountUserController::class, 'update'])->name('account.update');
    Route::delete('/account-siswa/{id}', [AccountUserController::class, 'delete'])->name('account.delete');
    Route::get('/mark-as-read/{id}', [DashboardConntroller::class, 'markAsRead'])->name('mark-as-read');
    
    // Unified Report Management
    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports.index');
    Route::post('/reports/{id}/status', [AdminReportController::class, 'updateStatus'])->name('reports.updateStatus');
});

// routes/web.php - Siswa Report Routes
Route::middleware('auth')->prefix('siswa')->group(function () {
    Route::get('/home', [ReportController::class, 'index'])->name('siswa.home');
    Route::post('/reports', [ReportController::class, 'store'])->name('siswa.reports.store');
    Route::get('/list-laporan', [ListReportController::class, 'index'])->name('siswa.reports.index');
    Route::get('/history', [HistoryReportController::class, 'index'])->name('siswa.history');
    // Tambahkan route lain untuk laporan jika diperlukan
});
