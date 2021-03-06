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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8'
            ];
    }
    public function messages()
    {
        return [
        'email.required' => 'Chưa nhập tên email',
        'email.email' => 'Chỉ nhập email',
        'password.required' => 'Chưa nhập mật khẩu',
        'password.min' => 'Mật khẩu nhiều hơn 8 kí tự'
        ];
    }
}
