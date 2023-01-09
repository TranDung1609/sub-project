<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add_product()
    {
        $category = Category::all();

        return view('admin.Product.add_product', ['category' => $category]);
    }

    public function list_product()
    {
        $product = Product::all();
        // $product = Product::paginate(9);
        return view('admin.Product.list_product', ['product' => $product]);
    }

    public function insert(ProductRequest $request)
    {
        try {
            $data = $request->all();
            $product = new Product();
            $product->fill($data);
            $product->save();
            $product->categories()->attach($request->category_id);
            if ($request->file('image')) {
                $uploadPath = 'storage/uploads/';
                foreach ($request->file('image') as $imageFile) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $nameImage = current(explode('.', $imageFile->getClientOriginalName()));
                    $filename = time() . $nameImage . '.' . $extention;
                    $imageFile->move($uploadPath, $filename);

                    $product->images()->create([
                        'product_id' => $product->id,
                        'image' => $filename,
                    ]);
                }
            }

            return redirect('product/list-product');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
        $product = Product::find($id);
        // dd($product->categories);
        $category = Category::all();

        return view('admin.Product.edit_product', ['product' => $product], ['category' => $category]);
    } catch (\Exception $e) {
        throw new \Exception($e->getMessage());
    }
    }

    public function update(ProductRequest $request, $id)
    {
        try {
        $data = $request->all();
        $product = Product::find($id)->fill($data);

        $product->categories()->sync($request->category_id);
        Image::where('product_id', $id)->delete();
        if ($request->file('image')) {
            $uploadPath = 'storage/uploads/';
            foreach ($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $nameImage = current(explode('.', $imageFile->getClientOriginalName()));
                $filename = $nameImage . '.' . $extention;
                $imageFile->move($uploadPath, $filename);

                $product->images()->create([
                    'product_id' => $product->id,
                    'image' => $filename,
                ]);
            }
        }
        $product->update($data);

        return redirect('product/list-product');
    } catch (\Exception $e) {
        throw new \Exception($e->getMessage());
    }
    }

    public function delete(Request $request, $id)
    {
        try{
        $data = $request->all();
        Product::find($id)->delete();

        return redirect('product/list-product');
    } catch (\Exception $e) {
        throw new \Exception($e->getMessage());
    }
    }
}
