@extends('dashboard.layout')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Admin Dashboard</h2>
    <div class="mb-4">
        <a href="{{ route('dashboard.products.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded inline-block">
            <i class="fas fa-plus"></i> Add Product
        </a>
    </div>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card text-center p-3">
                <h5>Total Sales</h5>
                <div class="display-6 fw-bold">${{ number_format($metrics['sales'], 0) }}</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center p-3">
                <h5>Orders</h5>
                <div class="display-6 fw-bold">{{ $metrics['orders'] }}</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center p-3">
                <h5>Products</h5>
                <div class="display-6 fw-bold">{{ $metrics['products'] }}</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center p-3">
                <h5>Active Users</h5>
                <div class="display-6 fw-bold">{{ $metrics['users'] }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
