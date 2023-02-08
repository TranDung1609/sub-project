<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function add_category()
    {
        return view('admin.Category.add_category');
    }

    public function list_category()
    {
        $cate = Category::all();

        return view('admin.Category.list_category', ['cate' => $cate]);
    }

    public function insert(CategoryRequest $request)
    {
        try {
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

        return Redirect::to('category/list-category');
    } catch (\Exception $e) {
        throw new \Exception($e->getMessage());
    }
    }

    public function edit($id)
    {
        try {
        $cate = Category::where('id', $id)->get();

        return view('admin.Category.edit_category', ['cate' => $cate]);
    } catch (\Exception $e) {
        throw new \Exception($e->getMessage());
    }
    }

    public function update(EditCategoryRequest $request, $id)
    {
        try {
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
        return Redirect::to('category/list-category');
    }catch (\Exception $e) {
        throw new \Exception($e->getMessage());
    }
    }

    public function delete(Request $request)
    {
        try {
        $cate = Category::find($request->id);
        $cate->delete();

        return Redirect::to('category/list-category');
    } catch (\Exception $e) {
        throw new \Exception($e->getMessage());
    }
    }
}
