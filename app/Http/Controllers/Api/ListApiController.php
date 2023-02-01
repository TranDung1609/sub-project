<?php

namespace App\Http\Controllers\Api;

use App\Constants\Params;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ListApiController extends Controller
{
    public function getUser()
    {
        $user = User::all();
        return $this->responseData($user);
    }
    public function getCategory()
    {
        $category = Category::where('status', '1')->get();
        return $this->responseData($category);
    }
    public function listProduct()
    {
        $product = Product::with(['categories', 'images'])->paginate(Params::LIMIT_SHOW);
        return $this->responseData($product);
    }
    public function search($name){
        $product = Product::with(['categories', 'images'])->where('name','like','%'.$name.'%')->paginate(10);
        return $this->responseData($product);
    }
    public function ProductCategory($id)
    {
        $product = Category::find($id)->products;
        return $this->responseData($product);
    }
    public function getProduct($id){
        $product = Product::with(['images'])->get()->find($id);
        return $this->responseData($product);
    }
}
