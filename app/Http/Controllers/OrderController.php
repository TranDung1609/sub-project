<?php

namespace App\Http\Controllers;

use App\Constants\Params;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::orderBy('id','DESC')->get();
        $user_ids = $data->pluck('user_id');
        $users = User::whereIn('id', $user_ids)->get()->toArray();
        foreach ($data as $item){
            foreach ($users as $user){
                if($user['id'] == $item['user_id']){
                    $item['name'] = $user['name'];
                    $item['email'] = $user['email'];
                }
            }
            if($item['order_status'] == Params::ORDER_START){
                $item['order_status'] = 'Đơn hàng chưa gửi';
            }
            if($item['order_status'] == Params::ORDER_END){
                $item['order_status'] = 'Đã gửi';
            }
        }
        return view('admin.Cart.cart', ['data' => $data]);
    }
    public function view($id){
        $cart = Order::with('orderDetails','shipping')->find($id);
        return view('admin.Cart.view', [
            'cart'=>$cart
        ]);
    }
    public function complete($id){
        $cart = Order::find($id);
        $cart->fill(['order_status' => Params::ORDER_END])->save();
        return redirect('order/list-order');
    }
}
