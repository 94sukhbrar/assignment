@extends('layouts.admin')

@section('title','Edit Product')

@section('content')

<h4>Edit Product</h4>

<form method="POST" action="/admin/products/{{ $product->id }}/update" enctype="multipart/form-data">
@csrf

<input class="form-control mb-2" name="name" value="{{ $product->name }}">

<textarea class="form-control mb-2" name="description">
{{ $product->description }}
</textarea>

<input class="form-control mb-2" name="price" value="{{ $product->price }}">

<select class="form-control mb-2" name="category_id">
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}"
            {{ $product->category_id == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
    @endforeach
</select>

{{-- Show old image --}}

<img id="preview" src="{{ asset('storage/'.$product->image) }}" width="100"  class="mb-2">

<input type="file" name="image" onchange="previewImage(event)" class="form-control mb-2">

<script>
function previewImage(e){
    document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
}
</script>

<button class="btn btn-success">Update</button>

</form>

@endsection