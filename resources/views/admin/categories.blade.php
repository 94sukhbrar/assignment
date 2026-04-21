@extends('layouts.admin')

@section('title','Categories')

@section('content')

<h5>Add Category</h5>

<form method="POST">
    @csrf
    <input class="form-control w-50 mb-2" name="name" placeholder="Category Name">
    <button class="btn btn-primary">Add</button>
</form>

<hr>

<h5>All Categories</h5>

@foreach($categories as $cat)
    <div class="border p-2 mb-2">
        {{ $cat->name }}
    </div>
@endforeach

@endsection