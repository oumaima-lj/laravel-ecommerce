<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Request $request, Product $product)
    {
        $user = auth()->user();

        if ($product->isLikedBy($user)) {
            $product->likes()->where('user_id', $user->id)->delete();
            return response()->json(['liked' => false]);
        }

        $product->likes()->create(['user_id' => $user->id]);
        return response()->json(['liked' => true]);
    }

    public function index()
    {
        $likedItems = auth()->user()->likedProducts ?? collect();
        return view('liked.index', compact('likedItems'));
    }
}
