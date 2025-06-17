<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
use App\Models\Option;

class QuizController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('quiz.index', compact('categories'));
    }

    public function start(Category $category)
    {
        $questions = $category->questions()->with('options')->get();
        return view('quiz.quiz', compact('questions', 'category'));
    }

    public function submit(Request $request)
    {
        $score = 0;
        $answers = $request->input('answers', []);

        foreach ($answers as $questionId => $optionId) {
            $isCorrect = Option::where('id', $optionId)
                ->where('is_correct', true)
                ->exists();

            if ($isCorrect) {
                $score++;
            }
        }

        return view('quiz.result', [
            'score' => $score,
            'total' => count($answers)
        ]);
    }
}
