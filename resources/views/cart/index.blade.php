@extends('layouts.app')

@section('content')

<h3>Your Cart</h3>

<table class="table">
<tr>
    <th>Product</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
</tr>

@php $total = 0; @endphp

@foreach($cart as $item)
<tr>
    <td>{{ $item['name'] }}</td>
    <td>₹{{ $item['price'] }}</td>
    <td>{{ $item['quantity'] }}</td>
    <td>₹{{ $item['price'] * $item['quantity'] }}</td>
</tr>

@php $total += $item['price'] * $item['quantity']; @endphp
@endforeach

</table>

<h4>Total: ₹{{ $total }}</h4>

<a href="/order/place" class="btn btn-success">Place Order</a>

@endsection