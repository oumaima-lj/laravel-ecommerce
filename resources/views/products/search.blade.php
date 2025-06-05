@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Search Results for "{{ $query }}"</h2>
    @if($products->count())
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No products found.</p>
    @endif
</div>
@endsection
