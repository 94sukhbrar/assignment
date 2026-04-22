@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<h3>Welcome Admin 👋</h3>

<div class="row mt-3">

    <div class="col-md-4">
        <div class="card p-3 text-center shadow">
            <h5>Categories</h5>
            <a href="/admin/categories" class="btn btn-primary btn-sm">Manage</a>
        </div>
    </div>
     <div class="col-md-4">
        <div class="card p-3 text-center shadow">
            <h5>Products</h5>
            <a href="/admin/products" class="btn btn-warning btn-sm">Manage </a>
        </div>
    </div>

    <!-- <div class="col-md-4">
        <div class="card p-3 text-center shadow">
            <h5>Products</h5>
            <a href="/admin/products/create" class="btn btn-success btn-sm">Add Product</a>
        </div>
    </div> -->

</div>

@endsection