@extends('layouts.admin')

@section('title','Orders')

@section('content')

<h4>All Orders</h4>

<table class="table table-bordered">
    <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Products</th>
        <th>Amount</th>
        <th>Date</th>
    </tr>

@foreach($orders as $order)

<tr>
    <!-- Order ID -->
    <td>#{{ $order->id }}</td>

    <!-- 9-digit User ID -->
    <td>
        {{ str_pad($order->user_id, 9, '0', STR_PAD_LEFT) }}
    </td>

    <!-- Products -->
    <td>
        @foreach($order->items as $item)
            <div>
                {{ $item->product->name ?? 'N/A' }} 
                (x{{ $item->quantity }})
            </div>
        @endforeach
    </td>

    <!-- Amount -->
    <td>₹{{ $order->total_amount }}</td>

    <!-- Date -->
    <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>

</tr>

@endforeach

</table>

@endsection