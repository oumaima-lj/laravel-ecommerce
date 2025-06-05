@extends('dashboard.layout')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Products</h2>
        <a href="{{ route('dashboard.products.create') }}" class="btn btn-success">Add Product</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>${{ $product['price'] }}</td>
                <td>{{ $product['category'] }}</td>
                <td>
                    <a href="{{ route('dashboard.products.show', $product['id']) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('dashboard.products.edit', $product['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('dashboard.products.destroy', $product['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
