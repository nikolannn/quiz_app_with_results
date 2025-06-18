<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\CategoryController;

Route::get('/', [QuizController::class, 'index'])->name('quiz.index'); // Show all categories

// Route::get('/quiz/{category}/start', [QuizController::class, 'start'])->name('quiz.result'); // Take quiz

Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit'); // Submit quiz answers

Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create'); // Show form to add question

Route::post('/quiz', [QuizController::class, 'store'])->name('quiz.store'); // Store new question

// Route::post('/categories', [CategoryController::class, 'store'])->name('category.store'); // Create new category

Route::get('/quiz/{category}/create', [QuizController::class, 'create'])->name('quiz.create');

Route::get('/quiz/{category}', [QuizController::class, 'start'])->name('quiz.start');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');




