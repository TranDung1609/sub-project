<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'phone' => 'required|numeric|digits:10',
            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên người nhận hàng',
            'name.max' => 'Tên người nhận có tối đa 50 ký tự',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại chỉ có thể là số',
            'phone.digits' => 'Số điện thoại có 10 lý tự',
            'address.required' => 'Vui lòng nhập địa chỉ nhận hàng',
        ];
    }
}
