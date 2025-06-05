<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() { /* ... */ }

    public function create() { /* ... */ }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product = new Product();
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->stock = $validated['stock'];
        $product->user_id = auth()->id();
        $product->image = $imagePath;
        $product->save();

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $products = \App\Models\Product::where('name', 'like', "%{$query}%")->get();
        return view('products.search', compact('products', 'query'));
    }
}
