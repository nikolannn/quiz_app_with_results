<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    // Show all quiz categories
    public function index() {
        $categories = Category::all();
        return view('quiz.index', compact('categories'));
    }

    // Start the quiz for a specific category
    public function start(Category $category) {
        $questions = $category->questions()->with('options')->get();
        return view('quiz.quiz', compact('category', 'questions')); // View should be quiz/quiz.blade.php
    }

    // Handle quiz submission and calculate score
    public function submit(Request $request, Category $category) {
        $data = $request->input('answers', []);
        $score = 0;

        foreach ($data as $questionId => $selectedOptionId) {
            $question = Question::find($questionId);
            $correctOption = $question->options()->where('is_correct', true)->first();

            if ($correctOption && $correctOption->id == $selectedOptionId) {
                $score++;
            }
        }

        return view('quiz.result', [
            'score' => $score,
            'total' => count($data),
        ]);
    }

    // Show form to create a new question
    public function create() {
        $categories = Category::all();
        return view('quiz.create', compact('categories')); // View should be quiz/create.blade.php
    }

    // Store new question and options
    public function store(Request $request) {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question_text' => 'required|string',
            'options' => 'required|array|min:2',
            'correct_option' => 'required|integer|min:0|max:3',
        ]);

        $question = Question::create([
            'category_id' => $request->category_id,
            'text' => $request->question_text,
        ]);

        foreach ($request->options as $index => $optionText) {
            Option::create([
                'question_id' => $question->id,
                'text' => $optionText,
                'is_correct' => $request->correct_option == $index,
            ]);
        }

        return redirect()->route('quiz.create')->with('success', 'Question added!');
    }
}
