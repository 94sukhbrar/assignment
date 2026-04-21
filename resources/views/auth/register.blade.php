@extends('layouts.auth')

<div class="position-absolute top-0 start-0 m-3">
    <a href="/" class="btn btn-light shadow-sm">
        ← Back to Home
    </a>
</div>

@section('title','Create Account')

@section('content')

<form method="POST" action="/register">
    @csrf

    <input class="form-control mb-2" name="name" placeholder="Full Name">

    <input class="form-control mb-2" name="mobile" placeholder="Mobile Number">

    <input class="form-control mb-3" name="email" placeholder="Email">

    <button class="btn btn-primary w-100">Register</button>

    <p class="text-center mt-3">
        Already have account? <a href="/login">Login</a>
    </p>
</form>

@endsection