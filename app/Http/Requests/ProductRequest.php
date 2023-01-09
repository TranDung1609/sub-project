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
            'description' => 'required|max:499',
            'image' => 'required',
            'category_id' => 'required',
        ];
    }
}
