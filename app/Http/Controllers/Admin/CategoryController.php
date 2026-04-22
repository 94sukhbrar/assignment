<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = \App\Models\Category::latest()->get();
        return view('admin.categories', compact('categories'));
    }

    public function edit($id)
    {
        $category = \App\Models\Category::findOrFail($id);
        return view('admin.category_edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $cat = \App\Models\Category::findOrFail($id);
        $cat->update(['name' => $request->name]);

        return redirect('/admin/categories');
    }

    public function delete($id)
    {
        \App\Models\Category::findOrFail($id)->delete();
        return back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return back()->with('success', 'Category added');
    }
}
