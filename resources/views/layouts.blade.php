<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | MyApp</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body class="font-sans antialiased">

        <!-- Navigation -->
        <nav class="navbar">
    <div class="nav-left">
        <a class="navbar-brand" href="/">MyApp</a>
        <a href="/">Home</a>
        <a href="/users">Users</a>
        <a href="/notes">Notes</a>
    </div>
    <div class="nav-right">
        @auth
            <a href="/dashboard">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button class="btn btn-link" type="submit" style="color:inherit;text-decoration:none;">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
</nav>


        <!-- Main Welcome Section -->
        <main class="relative z-10 text-center px-4 py-12">

        <div class="car-image">
    <img src="C:\Users\oumey\example-app\public\img\car.png" alt="Porsche Car">
</div>



            <h1 class="display-4 fw-bold">Welcome to MyApp</h1>
            <p class="lead mt-3 mb-5">
                Your trusted platform for carpooling and more. Sign up today and start your journey.
            </p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Get Started</a>
        </main>

        <!-- Placeholder Image Section -->
        <section class="text-center mt-5">
            <!-- Add your image here if needed -->
        </section>

        <!-- Footer -->
        <footer class="text-center text-sm text-muted py-5 z-10 relative">
This APP is made by OUMEYMA LAAJIMI        </footer>
</body>
</html>
