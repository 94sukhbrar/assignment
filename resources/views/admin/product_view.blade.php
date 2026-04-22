@extends('layouts.admin')

@section('title','Product Details')

@section('content')

<div class="card p-4 shadow">

    <h3>{{ $product->name }}</h3>

    <img src="{{ asset('storage/'.$product->image) }}" 
         style="width:200px; height:200px; object-fit:cover;" class="mb-3">

    <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>

    <p><strong>Description:</strong></p>
    <p>{{ $product->description }}</p>

    <h5><strong>Price:</strong> ₹{{ $product->price }}</h5>

    <a href="/admin/products" class="btn btn-secondary mt-3">Back</a>

</div>

@endsection