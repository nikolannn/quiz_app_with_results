<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function create()
    {
        $questions = Question::all(); // For selecting the question to attach option
        return view('options.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'option_text' => 'required|string|max:500',
            'is_correct' => 'nullable' // this will be treated manually
        ]);

        Option::create([
            'question_id' => $validated['question_id'],
            'option_text' => $validated['option_text'],
            'is_correct' => $request->has('is_correct') // checkbox: check if it was ticked
        ]);

        return redirect()->route('options.create')->with('success', 'Option added!');
    }
}
