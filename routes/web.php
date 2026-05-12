<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes — EduCourse Management System
|--------------------------------------------------------------------------
*/

// ── Basic Route ──────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

// ── Student Routes ───────────────────────────────────────────────────────
Route::get('/students', [StudentController::class, 'index'])->name('students');

// Optional Parameter Route
Route::get('/student/{name?}', [StudentController::class, 'greet'])->name('student.greet');

// ── Lecturer Routes ──────────────────────────────────────────────────────
Route::get('/lecturers', [LecturerController::class, 'index'])->name('lecturers');

// ── Course Routes ─────────────────────────────────────────────────────────
Route::get('/courses', [CourseController::class, 'index'])->name('courses');

// Route Parameter + Named Route
Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.detail');

// ── Profile Route ─────────────────────────────────────────────────────────
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// ── Article Routes ────────────────────────────────────────────────────────
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('article.detail');

// ── Prefix Route Group (Admin) ────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [HomeController::class, 'loginPage'])->name('login');
    Route::post('/login', [HomeController::class, 'loginPost'])->name('login.post');
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

// ── Fallback Route ────────────────────────────────────────────────────────
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});