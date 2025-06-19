<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
use App\Models\Option;

class QuestionController extends Controller
{
    public function create()
{
    $categories = Category::all(); 
    return view('questions.create', compact('categories'));
}


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question' => 'required|string|max:255',
            'options' => 'required|array|size:4',
            'options.*' => 'required|string|max:255',
            'correct_answer' => 'required|in:0,1,2,3',
        ]);

        $question = Question::create([
            'category_id' => $request->category_id,
            'question' => $request->question,
        ]);

        foreach ($request->options as $index => $text) {
            $question->options()->create([
                'option_text' => $text,
                'is_correct' => $index == $request->correct_answer,
            ]);
        }

        return redirect()->route('questions.create')->with('success', 'Question added successfully!');
    }
    public function destroy($id)
{
    $question = Question::findOrFail($id);
    $question->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Question deleted successfully.');
}
}
