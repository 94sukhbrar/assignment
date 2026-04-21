@extends('layouts.auth')

@section('title','Registration Successful')

@section('content')

<div class="text-center">

    <h5 class="mb-3">Your Login Credentials</h5>

    <p><b>User ID:</b> {{ $user_id }}</p>
    <p><b>Username:</b> {{ $username }}</p>
    <p><b>Password:</b> {{ $password }}</p>

    <a href="/login" class="btn btn-dark mt-3">Go to Login</a>

</div>

@endsection