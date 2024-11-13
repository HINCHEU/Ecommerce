<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use log;

class OrderController extends Controller
{
    public function processPayPalOrder(Request $request)
    {

        $request->validate([
            'shipping_address' => 'required|string',
            'total_price' => 'required|numeric',
            'cart_items.*.product_id' => 'required|integer|exists:products,id',
            'cart_items.*.productcolor_id' => 'required|integer|exists:productcolor,id',
            'cart_items.*.productsize_id' => 'required|integer|exists:productsize,id',
            'cart_items.*.quantity' => 'required|integer|min:1',
            'cart_items.*.base_price' => 'required|numeric',
            'cart_items.*.color_additional_price' => 'required|numeric',
            'cart_items.*.size_additional_price' => 'required|numeric',
            'cart_items.*.discount' => 'nullable|numeric|min:0|max:100',
            'paypal_order_id' => 'required|string',
            'paypal_payer_id' => 'required|string'
        ]);


        try {
            DB::beginTransaction();

            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'status' => 'pending',
                'shipping_address' => $request->shipping_address,
                'total_price' => $request->total_price,
                // 'coupon_id' => $request->coupon_id ?? null,
            ]);

            // // Create order items
            // foreach ($request->cart_items as $item) {
            //     OrderItem::create([
            //         'order_id' => $order->id,
            //         'product_id' => $item['product_id'],
            //         'productcolor_id' => $item['productcolor_id'],  // Store the color ID
            //         'productsize_id' => $item['productsize_id'],    // Store the size ID
            //         'quantity' => $item['quantity'],
            //         'price' => $item['base_price'] + $item['color_additional_price'] + $item['size_additional_price'],
            //         'final_price' => ($item['base_price'] + $item['color_additional_price'] + $item['size_additional_price'])
            //             * $item['quantity'] * (1 - $item['discount'] / 100)
            //     ]);
            // }

            // // Create payment record
            // Payment::create([
            //     'order_id' => $order->id,
            //     'payment_method' => 'PayPal',
            //     'payment_status' => 'completed',
            //     'discount_amount' => $request->discount_amount ?? 0,
            //     'amount' => $request->total_price,
            // ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order processed successfully',
                'order_id' => $order->id
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::info('Incoming PayPal Order Data:', ['cart_items' => $request->input('cart_items')]);

            return response()->json([
                'success' => false,
                'message' => 'Error processing order: ' . $e->getMessage()
            ], 500);
        }
    }
}
