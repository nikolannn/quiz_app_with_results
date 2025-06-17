<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuizController extends Controller
{

public function show()
{
    $questions = Question::with('choices')->get();
    return view('quiz', compact('questions'));
}

public function submit(Request $request)
{
    $score = 0;
    foreach ($request->input('answers') as $question_id => $choice_id) {
        $choice = \App\Models\Choice::find($choice_id);
        if ($choice && $choice->is_correct) {
            $score++;
        }
    }
    return view('result', [
        'score' => $score,
        'total' => count($request->input('answers'))
    ]);
}

}
