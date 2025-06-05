<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="dashboard-sidebar">
            <h2 class="dashboard-logo">{{ config('app.name', 'SkinCare') }}</h2>
            <nav class="dashboard-sidebar-nav">
                <a href="{{ route('dashboard') }}" class="dashboard-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Overview</a>
                <a href="{{ route('users.index') }}" class="dashboard-link {{ request()->routeIs('users.*') ? 'active' : '' }}">Users</a>
                <a href="#" class="dashboard-link">Products</a>
                <a href="#" class="dashboard-link">Reports</a>
                <a href="{{ route('profile.edit') }}" class="dashboard-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">Settings</a>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="dashboard-link w-full text-left">Logout</button>
                </form>
            </nav>

            <!-- Add Product Button and Form -->
            <button id="showAddProductForm" class="w-full bg-black text-white px-3 py-2 rounded text-sm hover:bg-gray-800 mt-8">Add Product</button>
            <div id="addProductForm" class="mt-4 p-4 bg-gray-100 rounded shadow hidden">
                <h3 class="text-lg font-bold mb-2">Add Product</h3>
                <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <input type="text" name="name" class="w-full border rounded px-2 py-1 text-sm" placeholder="Name" required>
                    </div>
                    <div class="mb-2">
                        <textarea name="description" class="w-full border rounded px-2 py-1 text-sm" placeholder="Description" required></textarea>
                    </div>
                    <div class="mb-2">
                        <input type="number" name="price" step="0.01" class="w-full border rounded px-2 py-1 text-sm" placeholder="Price" required>
                    </div>
                    <div class="mb-2">
                        <input type="number" name="stock" class="w-full border rounded px-2 py-1 text-sm" placeholder="Stock" required>
                    </div>
                    <div class="mb-2">
                        <input type="file" name="image" class="w-full text-sm">
                    </div>
                    <button type="submit" class="bg-black text-white px-3 py-1 rounded text-sm hover:bg-gray-800 w-full">Add</button>
                </form>
            </div>
        </aside>

        <!-- Main content -->
        <main class="dashboard-main-content">
            <header class="dashboard-header">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dashboard') }}</h1>
                <p class="text-gray-600">{{ __("You're logged in!") }}</p>
            </header>

            <section class="dashboard-cards">
                <div class="dashboard-card">
                    <h3>Users</h3>
                    <p>1,204</p>
                </div>
                <div class="dashboard-card">
                    <h3>Orders</h3>
                    <p>342</p>
                </div>
                <div class="dashboard-card">
                    <h3>Revenue</h3>
                    <p>$12,340</p>
                </div>
            </section>
        </main>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('showAddProductForm');
        const form = document.getElementById('addProductForm');
        btn.addEventListener('click', function() {
            form.classList.toggle('hidden');
        });
    });
</script>
