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
    public function search(Request $request){
        $param= $request->input('search');
        $product = Product::with(['categories', 'images'])->where('name','like','%'.$param.'%')->paginate(Params::LIMIT_SHOW);
        return $this->responseData($product);
    }
    public function ProductCategory($id)
    {
        // $product = Category::find($id)->products;

        $list_products = Category::find($id)->products->pluck('id');
        $products = Product::with('images')->whereIn('id',$list_products)->paginate(Params::LIMIT_SHOW);   
        return $this->responseData($products);
    }
    // public function CategoryProduct($id)
    // {
    //     $category = Product::find($id)->categories;
    //     return $this->responseData($category);
    // }
    public function getProduct($id){
        $product = Product::with(['images'])->find($id);
        return $this->responseData($product);
    }
}
