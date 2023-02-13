<?php

namespace App\Http\Controllers;

use App\Constants\Params;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListApiController extends Controller
{
    public function getUser()
    {
        $user = User::all();
        return $this->responseData($user, Response::HTTP_OK);
    }
    public function getCategory()
    {
        $category = Category::where('status', Params::CATEGORY_SHOW)->get();
        return $this->responseData($category, Response::HTTP_OK);
    }
    public function listProduct() 
    {
        $product = Product::with(['categories', 'images'])->paginate(Params::LIMIT_SHOW);
        return $this->responseData($product, Response::HTTP_OK);
    }
    public function search(Request $request){
        // $param= $request->input('search');
        $product = Product::with(['categories', 'images'])->filter()->paginate(Params::LIMIT_SHOW);
        return $this->responseData($product, Response::HTTP_OK);
    }
    public function productCategory($id)
    {
        $product_id = Category::find($id)->products->pluck('id');
        $products = Product::with('images')->whereIn('id',$product_id)->paginate(Params::LIMIT_SHOW);   
        return $this->responseData($products, Response::HTTP_OK);
    }
    public function getProduct($id){
        $product = Product::with(['images'])->find($id);
        return $this->responseData($product, Response::HTTP_OK);
    }
}
