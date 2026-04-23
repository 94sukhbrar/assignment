<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div style="width:250px; height:100vh; background:#212529; color:white;">
        <h4 class="text-center py-3">Admin Panel</h4>

        <ul class="nav flex-column px-2">
            <li><a href="/admin/dashboard" class="nav-link text-white">Dashboard</a></li>
            <li><a href="/admin/categories" class="nav-link text-white">Categories</a></li>
            <li><a href="/admin/products" class="nav-link text-white">All Products</a></li>
            <li><a href="/admin/products/create" class="nav-link text-white">Add Product</a></li>
            <li><a href="/" class="nav-link text-white">Visit Site</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="flex-grow-1 p-4">

        <div class="d-flex justify-content-between mb-3">
            <h4>@yield('title')</h4>
            <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
        </div>

        @yield('content')

    </div>

</div>

</body>
</html>