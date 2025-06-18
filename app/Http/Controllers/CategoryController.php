<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255'
    ]);

    Category::create([
        'name' => $request->name
    ]);

    return redirect()->back()->with('success', 'Category created!');
}

}
