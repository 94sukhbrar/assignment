@extends('layouts.admin')

@section('title','Categories')

@section('content')

<form method="POST">
@csrf
<input name="name" class="form-control w-50 mb-2" placeholder="Category name">
<button class="btn btn-primary">Add</button>
</form>

<hr>

<table class="table">
<tr>
    <th>Name</th>
    <th>Action</th>
</tr>

@foreach($categories as $cat)
<tr>
    <td>{{ $cat->name }}</td>
    <td>
        <a href="/admin/categories/{{ $cat->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
        <a href="/admin/categories/{{ $cat->id }}/delete" class="btn btn-danger btn-sm">Delete</a>
    </td>
</tr>
@endforeach

</table>

@endsection