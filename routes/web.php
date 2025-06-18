<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\HomeController;

Route::view('/', 'homepage')->name('home');

// Quiz routes
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::get('/quiz/{category}', [QuizController::class, 'start'])->name('quiz.start');
Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/category/create', [AdminController::class, 'createCategory'])->name('category.create');
Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('category.store');

Route::get('/admin/question/create', [AdminController::class, 'createQuestion'])->name('question.create');
Route::post('/admin/question/store', [AdminController::class, 'storeQuestion'])->name('question.store');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Questions
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');

// Options
Route::get('/options/create', [OptionController::class, 'create'])->name('options.create');
Route::post('/options', [OptionController::class, 'store'])->name('options.store');

Route::view('/', 'homepage')->name('home');

// Category delete route
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
// Question delete route
Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');


Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

