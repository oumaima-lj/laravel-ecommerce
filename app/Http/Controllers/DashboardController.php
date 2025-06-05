<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            // Redirect to admin dashboard
            return redirect('/admin/dashboard');
        }

        // For regular users
        $orders = $user->orders()->with('products')->get();
        $totalSpent = $orders->sum('total_price'); // Adjust field as needed

        return view('dashboard.user', compact('orders', 'totalSpent'));
    }
}
