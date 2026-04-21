@extends('layouts.auth')
<div class="position-absolute top-0 start-0 m-3">
    <a href="/" class="btn btn-light shadow-sm">
        ← Back to Home
    </a>
</div>

@section('title','Login')

@section('content')


<form method="POST" action="/login">
    @csrf

    <input class="form-control mb-2" name="username" placeholder="Username">

    <input class="form-control mb-3" type="password" name="password" placeholder="Password">

    <button class="btn btn-success w-100">Login</button>

    <p class="text-center mt-3">
        New user? <a href="/register">Sign Up</a>
    </p>
</form>

@endsection