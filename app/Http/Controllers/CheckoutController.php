<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function show(Request $request)
    {
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'details' => 'nullable|string',
        ]);

        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'details' => $validated['details'] ?? null,
            'total' => $total,
            'status' => 'pending',
        ]);

        // Optionally, save order items in a separate table

        session()->forget('cart');
        return redirect()->route('thankyou');
    }
}
