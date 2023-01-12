<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Tên tối đa 50 kí tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email phải theo cấu trúc abc@gmail.com',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Password phải có ít nhất 8 ký tự',
            'role.required' => 'Vui lòng chọn role',
        ];
    }
}
