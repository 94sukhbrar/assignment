<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

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
    public function edit($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $categories = \App\Models\Category::all();

        return view('admin.product_edit', compact('product', 'categories'));
    }
    public function show($id)
    {
        $product = \App\Models\Product::with('category')->findOrFail($id);
        return view('admin.product_view', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = \App\Models\Product::findOrFail($id);

        // ✅ IMAGE UPDATE
        if ($request->hasFile('image')) {

            // delete old image
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // upload new image
            $image = $request->file('image')->store('products', 'public');
            $product->image = $image;
        }

        // ✅ UPDATE OTHER DATA
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        $product->save(); // important

        return redirect('/admin/products')->with('success', 'Product updated');
    }

    public function delete($id)
    {
        \App\Models\Product::findOrFail($id)->delete();
        return back();
    }
}
