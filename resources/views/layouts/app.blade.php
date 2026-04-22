<!DOCTYPE html>
<html>

<head>
    <title>Laravel Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">MyStore</a>

            <div>
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/products">Products</a>
                    </li>

                    {{-- 🔐 IF USER LOGGED IN --}}
                    @auth
                      <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                    @endauth

                    {{-- 👤 IF USER NOT LOGGED IN --}}
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

</body>

</html>