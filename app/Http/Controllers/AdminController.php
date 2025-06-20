<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        $questions = Question::all();

        return view('admin.login.dashboard', compact('categories', 'questions'));
    }

    public function createCategory()
    {
        return view('admin.create-category');
    }
  

    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required']);
        Category::create(['name' => $request->name]);
        return redirect()->route('admin.dashboard')->with('success', 'Category added successfully!');
    }

    public function createQuestion()
    {
        $categories = Category::all();
        return view('admin.create-question', compact('categories'));
    }

    public function storeQuestion(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'category_id' => 'required|exists:categories,id',
            'options.*' => 'required|string',
            'correct_option' => 'required'
        ]);

        $question = Question::create([
            'question' => $request->question,
            'category_id' => $request->category_id
        ]);

        foreach ($request->options as $index => $text) {
            Option::create([
                'question_id' => $question->id,
                'option_text' => $text,
                'is_correct' => $index == $request->correct_option
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Question added successfully!');
    }
    
    
}
