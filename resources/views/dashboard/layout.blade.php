<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .sidebar { min-height: 100vh; background: #222; color: #fff; }
        .sidebar a { color: #fff; text-decoration: none; display: block; padding: 1rem; }
        .sidebar a.active, .sidebar a:hover { background: #444; }
        .sidebar-link {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 1rem;
            border-radius: 0;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            transition: background 0.2s;
        }
        .sidebar-link:hover, .sidebar-link:focus {
            background: #444;
            outline: none;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <nav class="sidebar p-3">
        <a href="{{ route('home') }}" class="btn btn-outline-primary mb-3 w-100">&larr; Back to Home</a>
        <h4 class="mb-4">Admin</h4>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('dashboard.products.index') }}" class="{{ request()->routeIs('dashboard.products.*') ? 'active' : '' }}">Products</a>
        <a href="{{ route('dashboard.orders') }}" class="{{ request()->routeIs('dashboard.orders') ? 'active' : '' }}">Orders</a>
        <a href="{{ route('dashboard.users') }}" class="{{ request()->routeIs('dashboard.users') ? 'active' : '' }}">Users</a>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf
            <button type="submit" class="sidebar-link" style="background:none;border:none;padding:1rem;width:100%;text-align:left;color:#fff;cursor:pointer;">
                Logout
            </button>
        </form>
    </nav>
    <main class="flex-grow-1">
        @yield('content')
    </main>
</div>
</body>
</html>
