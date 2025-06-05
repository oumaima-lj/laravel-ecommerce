<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $metrics = [
            'sales' => 12340,
            'orders' => 120,
            'products' => 34,
            'users' => 56,
        ];
        return view('dashboard.index', compact('metrics'));
    }



    public function updateOrderStatus(Request $request, $orderId)
    {
        // Mock update, just redirect back
        return redirect()->back()->with('success', 'Order status updated!');
    }

    public function users()
    {
        $users = User::all();
        $userCount = $users->count();
        return view('dashboard.users', compact('users', 'userCount'));
    }

    public function login()
    {
        return view('dashboard.login');
    }

    public function orders()
    {
        $orders = \App\Models\Order::with('user')->latest()->get();
        return view('dashboard.orders', compact('orders'));
    }
}
