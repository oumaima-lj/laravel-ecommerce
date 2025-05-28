<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2 class="logo">{{ config('app.name', 'Laravel') }}</h2>
            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Overview</a>
                <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">Users</a>
                <a href="#" class="nav-link">Products</a>
                <a href="#" class="nav-link">Reports</a>
                <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">Settings</a>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="nav-link w-full text-left">Logout</button>
                </form>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="main-content">
            <header class="dashboard-header">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dashboard') }}</h1>
                <p class="text-gray-600">{{ __("You're logged in!") }}</p>
            </header>

            <section class="cards">
                <div class="card">
                    <h3>Users</h3>
                    <p>1,204</p>
                </div>
                <div class="card">
                    <h3>Orders</h3>
                    <p>342</p>
                </div>
                <div class="card">
                    <h3>Revenue</h3>
                    <p>$12,340</p>
                </div>
            </section>
        </main>
    </div>
</x-app-layout>
