@extends('layouts.admin')

@section('title','Order Details')

@section('content')

<div class="card shadow p-4">

    <h3>Order Details</h3>
    <hr>

    <!-- ORDER INFO -->
    <p><strong>Order ID:</strong> #{{ $order->id }}</p>

    <p><strong>User ID:</strong> 
        {{ str_pad($order->user_id, 9, '0', STR_PAD_LEFT) }}
    </p>

    <p><strong>User Name:</strong> {{ $order->user->name ?? 'N/A' }}</p>

    <p><strong>Date:</strong> 
        {{ $order->created_at->format('d M Y, h:i A') }}
    </p>

</div>

<br>

<!-- PRODUCTS -->
<div class="card shadow p-4">

    <h4>Products</h4>

    <table class="table">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>

        @php $grandTotal = 0; @endphp

        @foreach($order->items as $item)

        <tr>
            <td>
                <img src="{{ asset('storage/'.$item->product->image) }}" width="70">
            </td>

            <td>{{ $item->product->name ?? 'N/A' }}</td>

            <td>₹{{ $item->price }}</td>

            <td>{{ $item->quantity }}</td>

            <td>₹{{ $item->price * $item->quantity }}</td>
        </tr>

        @php $grandTotal += $item->price * $item->quantity; @endphp

        @endforeach

    </table>

    <hr>

    <h4 class="text-end">Grand Total: ₹{{ $grandTotal }}</h4>

</div>

<br>

<a href="/admin/orders" class="btn btn-secondary">Back</a>

@endsection