<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.addCategory');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255|unique:category,title',
            'description' => 'required|string|max:1000',
        ]);

        $data = [
            'title'       => $validated['title'],
            'description' => $validated['description'],
        ];

        Category::create($data);

        return redirect()
            ->route('categories.create')
            ->with('success', 'Category created successfully.');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.editCategory', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255|unique:category,title,' . $category->id,
            'description' => 'nullable|string|max:1000',
        ]);

        $category->update($data);

        return redirect()->route('categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}
