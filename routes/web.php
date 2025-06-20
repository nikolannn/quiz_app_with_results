<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;

// Homepage
Route::view('/', 'homepage')->name('home');

// Redirect default login to admin login
Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');

// ===================
// Public Quiz Routes
// ===================
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::get('/quiz/{category}', [QuizController::class, 'start'])->name('quiz.start');
Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');

// ===================
// Admin Auth Routes
// ===================
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
//
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// ==============================
// Protected Admin Routes (auth + admin)
// ==============================
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    // Category Management
    Route::get('/admin/category/create', [AdminController::class, 'createCategory'])->name('category.create');
    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('category.store');

    // Question Management
    Route::get('/admin/question/create', [AdminController::class, 'createQuestion'])->name('question.create');
    Route::post('/admin/question/store', [AdminController::class, 'storeQuestion'])->name('question.store');

    // Option Management
    Route::get('/options/create', [OptionController::class, 'create'])->name('options.create');
    Route::post('/options', [OptionController::class, 'store'])->name('options.store');
});

// ===================
// Category & Question (CRUD outside admin group)
// ===================
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
