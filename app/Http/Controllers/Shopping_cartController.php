<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shopping_cart;
use Illuminate\Support\Facades\Auth;

class Shopping_cartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Updated validation to match your table names
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'productsize_id' => 'required|exists:productsize,id', // Changed from productsizes to productsize
            'productcolor_id' => 'required|exists:productcolor,id', // Changed from productcolors to productcolor
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            // Check if item already exists in cart
            $existingCart = shopping_cart::where([
                'user_id' => Auth::id(),
                'product_id' => $validatedData['product_id'],
                'productsize_id' => $validatedData['productsize_id'],
                'productcolor_id' => $validatedData['productcolor_id'],
            ])->first();

            if ($existingCart) {
                // Update quantity if item exists
                $existingCart->quantity += $validatedData['quantity'];
                $existingCart->save();
            } else {
                // Create new cart item
                $cart = new shopping_cart();
                $cart->user_id = Auth::id();
                $cart->product_id = $validatedData['product_id'];
                $cart->productsize_id = $validatedData['productsize_id'];
                $cart->productcolor_id = $validatedData['productcolor_id'];
                $cart->quantity = $validatedData['quantity'];
                $cart->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add product to cart',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
