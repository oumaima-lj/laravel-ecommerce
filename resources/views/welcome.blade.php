@extends('layouts')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Skincare') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        .product-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .like-button {
            transition: color 0.2s;
        }
        .like-button:hover {
            color: #ef4444;
        }
        .add-to-cart-button {
            transition: background-color 0.2s;
        }
        .add-to-cart-button:hover {
            background-color: #1a1a1a;
        }
        .cart-icon {
            position: relative;
        }
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #ef4444;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        .animate-marquee {
            display: inline-block;
            min-width: 100vw;
            animation: marquee 30s linear infinite;
        }
        .marquee-text-custom {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            color: transparent;
            -webkit-text-stroke: 2px #fff;
            text-stroke: 2px #fff;
            text-align: center;
            white-space: nowrap;
        }
        @media (min-width: 768px) {
            .marquee-text-custom {
                font-size: 5.5rem;
            }
        }
    </style>
</head>
<body class="antialiased bg-gray-100">
    <div class="min-h-screen">
        @include('components.navbar')

        <!-- Hero Section -->
        <div class="bg-white">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                        Welcome to Our Store
                    </h1>
                    <p class="mt-5 max-w-xl mx-auto text-xl text-gray-500">
                        Discover our amazing products at great prices
                    </p>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <a href="{{ route('products.show', $product->id) }}">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        </a>
                        <div class="p-4">
                            <a href="{{ route('products.show', $product->id) }}" class="hover:underline">
                                <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                            </a>
                            <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                            <div class="flex justify-between items-center">
                                @if($product->on_sale)
                                    <span class="text-xl font-bold text-red-500">
                                        ${{ number_format($product->price * 0.8, 2) }}
                                        <span class="line-through text-gray-500">${{ number_format($product->price, 2) }}</span>
                                    </span>
                                @else
                                    <span class="text-xl font-bold">${{ number_format($product->price, 2) }}</span>
                                @endif
                                <div class="flex space-x-2">
                                    @auth
                                    <button onclick="toggleLike({{ $product->id }})" class="text-gray-500 hover:text-red-500 focus:outline-none">
                                        <svg class="w-6 h-6 {{ $product->isLikedBy(auth()->user()) ? 'text-red-500' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                    <button onclick="addToCart({{ $product->id }})" class="text-gray-500 hover:text-blue-500 focus:outline-none">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </button>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // Set up CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Like button functionality
        document.querySelectorAll('.like-button').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const icon = this.querySelector('i');

                fetch(`/products/${productId}/like`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.liked) {
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        icon.style.color = '#ef4444';
                    } else {
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        icon.style.color = '';
                    }
                });
            });
        });

        // Add to cart functionality
        document.querySelectorAll('.add-to-cart-button').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;

                fetch(`/cart/${productId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('cart-count').textContent = data.cart_count;
                    alert(data.message);
                });
            });
        });

        function toggleLike(productId) {
            fetch(`/products/${productId}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const button = document.querySelector(`button[onclick="toggleLike(${productId})"] svg`);
                if (data.liked) {
                    button.classList.add('text-red-500');
                } else {
                    button.classList.remove('text-red-500');
                }
            });
        }

        function addToCart(productId) {
            fetch(`/cart/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const cartCountElement = document.getElementById('cart-count');
                if (cartCountElement) {
                    cartCountElement.textContent = data.cart_count;
                }
                alert(data.message);
            });
        }
    </script>
</body>
</html>
