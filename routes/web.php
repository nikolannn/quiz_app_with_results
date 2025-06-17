<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/quiz', [QuizController::class, 'show']);
Route::post('/quiz', [QuizController::class, 'submit']);



Route::get('/', function () {
    return view('welcome');
});
