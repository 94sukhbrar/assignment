<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function home()
    {
        $products = Product::latest()->take(8)->get(); // latest 8 products
        return view('home', compact('products'));
    }
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
}
