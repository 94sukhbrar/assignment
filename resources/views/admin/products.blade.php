@extends('layouts.admin')

@section('title','Add Product')

@section('content')

<form method="POST" action="/admin/products" enctype="multipart/form-data">
@csrf

<input class="form-control mb-2" name="name" placeholder="Product Name">

<textarea class="form-control mb-2" name="description" placeholder="Description"></textarea>

<input class="form-control mb-2" name="price" placeholder="Price">

<select class="form-control mb-2" name="category_id">
    <option value="">Select Category</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
    @endforeach
</select>

<input class="form-control mb-2" type="file" name="image">

<button class="btn btn-success">Add Product</button>

</form>

@endsection