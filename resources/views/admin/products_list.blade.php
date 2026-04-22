@extends('layouts.admin')

@section('title','Products')

@section('content')

<table class="table">
<tr>
    <th>Image</th>
    <th>Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Action</th>
</tr>

@foreach($products as $p)
<tr>
    <td>
        <img src="{{ asset('storage/'.$p->image) }}" width="60">
    </td>
    <td>{{ $p->name }}</td>
    <td>{{ $p->category->name ?? '' }}</td>
    <td>₹{{ $p->price }}</td>
    <td>
          <a href="/admin/products/{{ $p->id }}" class="btn btn-info btn-sm">View</a>
        <a href="/admin/products/{{ $p->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
        <a href="/admin/products/{{ $p->id }}/delete" class="btn btn-danger btn-sm">Delete</a>
    </td>
</tr>
@endforeach

</table>

@endsection