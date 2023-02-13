<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    protected $service;
    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }
    public function addCategory()
    {
        return view('admin.Category.add_category');
    }
    public function listCategory()
    {
        $cate = Category::all();
        return view('admin.Category.list_category', ['cate' => $cate]);
    }
    public function insert(CategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->service->createCategory($request);
            DB::commit();
            return Redirect::to('category/list-category');
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e->getMessage());
        }
    }
    public function edit($id)
    {
            $cate = Category::where('id', $id)->get();
            return view('admin.Category.edit_category', ['cate' => $cate]);
    }
    public function update(EditCategoryRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $this->service->updateCategory($request, $id);
            DB::commit();
            return Redirect::to('category/list-category');
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e->getMessage());
        }
    }
    public function delete(Request $request)
    {
        $cate = Category::find($request->id);
        $cate->delete();
        return Redirect::to('category/list-category');
    }
}
