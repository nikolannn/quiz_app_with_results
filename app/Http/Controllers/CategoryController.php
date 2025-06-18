<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Category::create($validated);

    // Redirect to the admin dashboard instead of categories.index
    return redirect()->route('admin.dashboard')->with('success', 'Category created successfully.');
}

    }

   public function destroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Category deleted successfully.');
}


}
