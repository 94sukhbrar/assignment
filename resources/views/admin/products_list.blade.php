@extends('layouts.admin')

@section('title','All Products')

@section('content')

<h4>All Products</h4>

<table class="table">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
    </tr>

@foreach($products as $p)
<tr>
    <td>
        <img src="{{ asset('/storage/products/gX0RAAiNaXW6bkwgCGQOjiFDhC2lL7dinSoEP5z4.png') }}" width="100" alt="{{$p->image}}">
    </td>
    <td>{{ $p->name }}</td>
    <td>{{ $p->category->name ?? '' }}</td>
    <td>₹{{ $p->price }}</td>
</tr>
@endforeach

</table>

@endsection