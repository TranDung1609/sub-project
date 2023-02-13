<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function createProduct($request)
    {
        $data = $request->all();
        $product = new Product();
        $product->fill($data)->save();
        $product->categories()->attach($request->category_id);
        if ($request->Hasfile('image')) {
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
    }
    public function updateProduct($request, $id)
    {
        $data = $request->all();
        $product = Product::find($id)->fill($data);
        $product->categories()->sync($request->category_id);
        // Image::where('product_id', $id)->delete();
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
        $product->update($data);
    }
}
