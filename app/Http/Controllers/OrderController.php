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
        $datas = Order::orderBy('id','DESC')->get();
        $user_ids = $datas->pluck('user_id');
        $users = User::whereIn('id', $user_ids)->get()->toArray();
        foreach ($datas as $data){
            foreach ($users as $user){
                if($user['id'] == $data['user_id']){
                    $data['name'] = $user['name'];
                    $data['email'] = $user['email'];
                }
            }
            if($data['order_status'] == Params::ORDER_START){
                $data['order_status'] = 'Đơn hàng chưa gửi';
            }
            if($data['order_status'] == Params::ORDER_END){
                $data['order_status'] = 'Đã gửi';
            }
        }
        return view('admin.Cart.cart', ['datas' => $datas]);
    }
    public function view($id){
        $cart = Order::with('order_details','shipping')->find($id);
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
