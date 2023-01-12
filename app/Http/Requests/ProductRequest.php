<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'price' => 'required|integer|min:1',
            'quantity' => 'required|integer|min:1',
            'description' => 'required|max:255',
            'image.*' => 'required|mimes:jpeg,png,jpg|max:5120',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.max' => 'Tên sản phẩm có tối đa 50 ký tự',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.min' => 'Giá sản phẩm ít nhất bằng 1',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
            'quantity.min' => 'Số lượng sản phẩm ít nhất bằng 1',
            'description.required' => 'Vui lòng mô tả sản phẩm',
            'description.max' => 'Mô tả sản phẩm nhiều nhất 255 ký tự',
            'image.*.required' => 'Vui lòng chọn ảnh',
            'image.*.mimes' => 'Ảnh phải là định dạng jpeg,png hoặc jpg',
            'image.*.max' => 'Ảnh phải nhỏ hơn 5MB',
            'category_id.required' => 'Vui lòng danh mục sản phẩm',
        ];
    }
}
