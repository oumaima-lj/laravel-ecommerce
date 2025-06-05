<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::all();
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        return view('dashboard.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'category' => 'nullable|string',
            // add other fields as needed
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['user_id'] = auth()->id();

        \App\Models\Product::create($validated);

        return redirect()->route('dashboard.products.index')->with('success', 'Product added successfully!');
    }

    public function show($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        return view('dashboard.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        return view('dashboard.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Mock update, just redirect
        return redirect()->route('dashboard.products.index')->with('success', 'Product updated!');
    }

    public function destroy($id)
    {
        // Mock delete, just redirect
        return redirect()->route('dashboard.products.index')->with('success', 'Product deleted!');
    }

    public function orders()
    {
        $orders = \App\Models\Order::with('user')->latest()->get();
        return view('dashboard.orders', compact('orders'));
    }
}
