@extends('layouts.app')

@section('content')

<h3 class="mb-4">All Products</h3>

<div class="row">

@foreach($products as $product)

<div class="col-md-4 mb-4">
    <div class="card shadow-sm">

        <img src="{{ asset('storage/'.$product->image) }}" 
             style="height:200px; object-fit:cover;">

        <div class="card-body">

            <h5>{{ $product->name }}</h5>

            <p class="text-muted">
                Category: {{ $product->category->name ?? 'N/A' }}
            </p>

            <p>{{ $product->description }}</p>

            <h6>₹{{ $product->price }}</h6>

        </div>

    </div>
</div>

@endforeach

</div>

@endsection