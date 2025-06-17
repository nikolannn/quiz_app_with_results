<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', [QuizController::class, 'show']);
Route::post('/', [QuizController::class, 'submit']);


// Route::get('/', function () {
//     return view('result');
// });
