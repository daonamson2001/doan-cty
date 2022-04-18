<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'min:6|max:32',
        ];
    }
    public function messages()
    {
        return [
            'password.min' => 'Mật khẩu phải trên 6 ký tự',
            'password.max' => 'Mật khẩu phải dưới 32 ký tự',
        ];
    }
}