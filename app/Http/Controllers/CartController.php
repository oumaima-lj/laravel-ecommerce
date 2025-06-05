<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, \App\Models\Product $product)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function remove(Cart $cart)
    {
        if ($cart->user_id !== auth()->id()) {
            abort(403);
        }

        $cart->delete();

        return response()->json([
            'message' => 'Product removed from cart',
            'cart_count' => auth()->user()->cart()->sum('quantity')
        ]);
    }

    public function updateQuantity(Cart $cart, Request $request)
    {
        if ($cart->user_id !== auth()->id()) {
            abort(403);
        }

        $action = $request->input('action');

        if ($action === 'increase') {
            $cart->increment('quantity');
        } elseif ($action === 'decrease') {
            if ($cart->quantity > 1) {
                $cart->decrement('quantity');
            }
        }

        return response()->json([
            'success' => true,
            'quantity' => $cart->quantity
        ]);
    }
}
