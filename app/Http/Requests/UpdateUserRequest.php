<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name_users' => 'min:5|max:50',
            'address_users' => 'min:5|max:100',
            'phone_users' => 'min:5|max:10|starts_with:0',
        ];
    }
    public function messages()
    {
        return [
            'name_users.min' => 'Tên phải trên 5 ký tự !',
            'name_users.max' => 'Tên không quá 50 ký tự !',
            'address_users.min' => 'Địa chỉ phải trên 5 ký tự !',
            'address_users.max' => 'Địa chỉ không quá 100 ký tự !',
            'phone_users.min' => 'Số điện thoại phải 10 ký tự !',
            'phone_users.max' => 'Số điện thoại phải 10 ký tự !',
            'phone_users.starts_with' => 'Số điện thoại phải bắt đầu bằng số 0 !',
        ];
    }
}