<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function create_category($request)
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
    public function update_category($request, $id)
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