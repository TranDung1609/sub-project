<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller

{
    // public function __construct()
    // {
    //     // $this->middleware('auth:api', ['except' => ['login','register']]);
    //     Auth::setDefaultDriver('api');
    // }
    public function payment(Request $request){
            $user_id = Auth::user()->id;
            $objects = $request->obj;
            $total = $request->total;
            $order = new Order();
            $order->user_id = $user_id;
            $order->order_total = $total;
            $order->order_status = 1;
            $order->save();
            foreach ($objects as $obj) {
                $product = Product::find($obj['product_id']);
                $quantity = $product['quantity'] - $obj['quantity'];
                DB::table('order_details')->insert(
                    [
                        'order_id' => $order->id,
                        'product_id' => $obj['product_id'],
                        'quantity' => $obj['quantity'],
                        'product_name' => $product->name,
                        'product_price' => $obj['price']
                    ]
                );
                $product->update(
                    ['quantity' => $quantity]
                );
            }
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully payment ok',
        ]);
    }
}
