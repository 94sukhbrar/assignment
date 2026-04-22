<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function add($id)
    {
        // ❌ If not logged in → save product and redirect
        if (!auth()->check()) {

            session()->put('intended_product', $id);

            return redirect()->route('login')
                ->with('error', 'Please login to add product');
        }

        return $this->addToCart($id);
    }
    private function addToCart($id)
    {
        $product = \App\Models\Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect('/cart')->with('success', 'Product added');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
}
