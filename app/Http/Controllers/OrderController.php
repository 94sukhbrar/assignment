<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function place()
    {
        $cart = session()->get('cart');

        if(!$cart){
            return back()->with('error','Cart empty');
        }

        $total = 0;

        foreach($cart as $item){
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $total
        ]);

        foreach($cart as $id => $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        session()->forget('cart');

        return redirect('/')->with('success','Order placed');
    }
    public function index()
{
    $orders = \App\Models\Order::with(['items.product','user'])->latest()->get();
    return view('admin.orders', compact('orders'));
}
}
