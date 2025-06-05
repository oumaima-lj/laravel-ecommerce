@extends('dashboard.layout')

@section('content')
<div class="container py-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <img src="{{ asset('storage/' . $product['image']) }}" class="card-img-top" alt="{{ $product['name'] }}">
        <div class="card-body">
            <h3 class="card-title">{{ $product['name'] }}</h3>
            <p class="card-text">{{ $product['description'] }}</p>
            <p class="card-text"><strong>Price:</strong> ${{ $product['price'] }}</p>
            <p class="card-text"><strong>Category:</strong> {{ $product['category'] }}</p>
            <a href="{{ route('dashboard.products.edit', $product['id']) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
