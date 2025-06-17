<?php

use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\QuizController;

Route::get('/', [QuizController::class, 'index'])->name('quiz.index');
Route::get('/quiz/{category}', [QuizController::class, 'start'])->name('quiz.start');
Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
