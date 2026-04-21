@extends('layouts.app')

@section('content')

<h2 class="mb-4">Welcome to Our Store 🛍</h2>

<h4>Latest Products</h4>

<div class="row">
    @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top">

                <div class="card-body">
                    <h5>{{ $product->name }}</h5>
                    <p>₹{{ $product->price }}</p>

                    <a href="https://wa.me/?text={{ urlencode($product->name.' ₹'.$product->price.' '.asset($product->image)) }}" 
                       target="_blank" 
                       class="btn btn-success btn-sm">
                       WhatsApp Share
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection