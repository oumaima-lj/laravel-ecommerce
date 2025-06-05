<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with(['user', 'likes'])->latest()->take(8)->get();

        // If user is authenticated, get their cart count and liked products
        if (auth()->check()) {
            $cartCount = auth()->user()->cart()->sum('quantity');
            $likedProductIds = auth()->user()->likes()->pluck('product_id')->toArray();
        } else {
            $cartCount = 0;
            $likedProductIds = [];
        }

        return view('welcome', compact('products', 'cartCount', 'likedProductIds'));
    }

    public function effects()
    {
        // Example: Array of effect image filenames (stored in public/effects/)
        $effects = [
            '66.png',
            '1.png',
            '68.png',
            '69.png',
        ];

        // Get some featured products (e.g., 4 random)
        $products = \App\Models\Product::inRandomOrder()->take(4)->get();

        return view('effects', compact('effects', 'products'));
    }
}
