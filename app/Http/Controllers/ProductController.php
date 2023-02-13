<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $service;
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
    public function addProduct()
    {
        $category = Category::all();
        return view('admin.Product.add_product', ['category' => $category]);
    }
    public function index()
    {
        $product = Product::all();
        return view('admin.Product.list_product', ['product' => $product]);
    }
    public function insert(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->service->createProduct($request);
            DB::commit();
            return redirect('product/list-product');
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e->getMessage());
        }
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.Product.edit_product', ['product' => $product], ['category' => $category]);
    }
    public function update(ProductRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $this->service->updateProduct($request, $id);
            DB::commit();
            return redirect('product/list-product');
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e->getMessage());
        }
    }
    public function delete(Request $request, $id)
    {
        $data = $request->all();
        Product::find($id)->delete($data);
        return redirect('product/list-product');
    }
}
