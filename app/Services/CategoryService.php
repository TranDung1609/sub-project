<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function createCategory($request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $uploadPath = 'categories';
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $nameImage = current(explode('.', $file->getClientOriginalName()));
            $filename = time().$nameImage . '.' . $extention;
            $file->move($uploadPath, $filename);
            $data['image']=$filename;
            Category::create($data);
        }
    }
    public function updateCategory($request, $id)
    {
        $data = $request->all();
        $category = Category::find($id)->fill($data);
        if ($request->hasFile('image')) {
            $uploadPath = 'categories';
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $nameImage = current(explode('.', $file->getClientOriginalName()));
            $filename = time().$nameImage . '.' . $extention;
            $file->move($uploadPath, $filename);
            $data['image']=$filename;
        }
        $category->update($data);
    }
}