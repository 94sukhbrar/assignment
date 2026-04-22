@extends('layouts.admin')

@section('title','Edit Category')

@section('content')

<h4>Edit Category</h4>

<form method="POST" action="/admin/categories/{{ $category->id }}/update">
@csrf

<input 
    type="text" 
    name="name" 
    class="form-control w-50 mb-2" 
    value="{{ $category->name }}"
>

<button class="btn btn-success">Update</button>

<a href="/admin/categories" class="btn btn-secondary">Back</a>

</form>

@endsection