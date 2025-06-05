<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController–resource extends Controller
{
    public function index() { /* ... */ }
    public function create() { /* ... */ }
    public function store(Request $request) { /* ... */ }
    public function show($id) { /* ... */ }
    public function edit($id) { /* ... */ }
    public function update(Request $request, $id) { /* ... */ }
    public function destroy($id) { /* ... */ }

    public function returnView()
    {
        $orders = \App\Models\Order::with('user')->latest()->get();
        return view('dashboard.orders', compact('orders'));
    }
}
