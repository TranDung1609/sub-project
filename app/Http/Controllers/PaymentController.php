<?php

namespace App\Http\Controllers;

use App\Constants\Params;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
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
            $name = $request->name;
            $phone = $request->phone;
            $address = $request->address;
            $order = new Order();
            $order->user_id = $user_id;
            $order->order_total = $total;
            $order->order_status = 1;
            $order->save();
            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->name = $name;
            $shipping->phone = $phone;
            $shipping->address = $address;
            $shipping->save();
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
    public function history(){
        $order = Auth::user()->orders;
        return response()->json([$order]);
    }
    public function order_details($id){
        $order_details = Order::with('order_details','shipping')->find($id);
        return response()->json([$order_details]);
    }
}
