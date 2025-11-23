<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminScholarshipController;
use App\Http\Controllers\AdminCompetitionController;

// Landing Page / Welcome
Route::get('/', function () {
    return Auth::check() ? redirect('/home') : view('welcome');
})->name('welcome');

// Guest Routes (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

// Auth Routes (sudah login)



Route::middleware('auth')->group(function () {

    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/{id}', [HomeController::class, 'show'])->name('home.show');

    // Scholarship list
    Route::get('/scholarships', [HomeController::class, 'scholarships'])->name('scholarships');

    // Contest list
    Route::get('/contests', [HomeController::class, 'contests'])->name('contests');

    // Bookmark
    Route::post('/bookmark/{id}/{tipe}', [BookmarkController::class, 'toggle'])->name('bookmark.toggle');
    Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmarks');

    Route::get('/notifications', 
        [NotificationController::class, 'index']
    )->name('notifications');

    Route::post('/notifications/create/{id}', 
        [NotificationController::class, 'create']
    )->name('notifications.create');

    Route::post('/notifications/read/{id}', 
        [NotificationController::class, 'markAsRead']
    )->name('notifications.read');

    Route::delete('/notifications/{id}', 
        [NotificationController::class, 'destroy']
    )->name('notifications.delete');

    Route::post('/notifications/toggle/{id}', [NotificationController::class, 'toggle'])
    ->name('notifications.toggle');

    // Logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // Scholarship admin
    Route::get('/admin/scholarships', [AdminScholarshipController::class, 'index'])->name('scholarship.index');
    Route::get('/admin/scholarships/create', [AdminScholarshipController::class, 'create'])->name('scholarship.create');
    Route::post('/admin/scholarships', [AdminScholarshipController::class, 'store'])->name('scholarship.store');
    Route::get('/admin/scholarships/{id}/edit', [AdminScholarshipController::class, 'edit'])->name('scholarship.edit');
    Route::put('/admin/scholarships/{id}', [AdminScholarshipController::class, 'update'])->name('scholarship.update');
    Route::delete('/admin/scholarships/{id}', [AdminScholarshipController::class, 'destroy'])->name('scholarship.destroy');

    // Competition admin
    Route::get('/admin/competitions', [AdminCompetitionController::class, 'index'])->name('competition.index');
    Route::get('/admin/competitions/create', [AdminCompetitionController::class, 'create'])->name('competition.create');
    Route::post('/admin/competitions', [AdminCompetitionController::class, 'store'])->name('competition.store');
    Route::get('/admin/competitions/{id}/edit', [AdminCompetitionController::class, 'edit'])->name('competition.edit');
    Route::put('/admin/competitions/{id}', [AdminCompetitionController::class, 'update'])->name('competition.update');
    Route::delete('/admin/competitions/{id}', [AdminCompetitionController::class, 'destroy'])->name('competition.destroy');
});
