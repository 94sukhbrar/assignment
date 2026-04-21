<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{

    public function index()
    {
        $products = \App\Models\Product::with('category')->get();
        return view('admin.products_list', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'required|image'
        ]);

        $image = $request->file('image')->store('products', 'public');
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $image
        ]);

        return back()->with('success', 'Product added');
    }
}
