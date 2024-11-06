<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shopping_cart;
use Illuminate\Support\Facades\Auth;

class Shopping_cartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_color_id' => 'required|exists:productcolor,id',
            'product_size_id' => 'required|exists:productsize,id',
            'quantity' => 'required|integer|min:1', // Ensure at least one item
        ]);

        // Get the user ID of the authenticated user
        $userId = Auth::id();

        // Create a new entry in the shopping cart
        $cartItem = shopping_cart::create([
            'user_id' => $userId,
            'product_id' => $request->product_id,
            'productcolor_id' => $request->product_color_id,
            'productsize_id' => $request->product_size_id,
            'quanity' => $request->quantity, // Check the spelling if it should be 'quantity'
        ]);

        return response()->json(['message' => 'Item added to cart successfully!', 'cart_item' => $cartItem], 201);
    }
}
