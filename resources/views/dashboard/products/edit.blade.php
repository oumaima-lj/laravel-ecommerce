@extends('dashboard.layout')

@section('content')
<div class="container py-5">
    <h2>Edit Product</h2>
    <form action="{{ route('dashboard.products.update', $product['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product['name'] }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product['price'] }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product['description'] }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $product['image'] }}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ $product['category'] }}">
        </div>
        <button type="submit" class="btn btn-success">Update Product</button>
        <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
