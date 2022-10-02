<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\RegisterController;
class RequestLogin extends FormRequest
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
            'name' =>'required|unique|min',
            'email' =>'required|string|email|unique:users',
            'password' =>'required|string|confirmed|min:6'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã trùng',
            'name.min' => 'Tên sản phẩm không được được nhỏ hơn 10 kí tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã trùng',
            'password.required' =>'Password không được để trống',
            'password.confirmed' =>'Nhập Pass không đúng',
            'password.min' =>'Password không được được nhỏ hơn 6 kí tự'
            // 'contents.min' => 'Nội dung không được dưới 3 kí tự',

        ];
    }
}
