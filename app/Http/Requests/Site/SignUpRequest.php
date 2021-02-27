<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'                  => 'required|min:6',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => 'Full Name Is Required',
            'name.min'              => 'The Full Name Must Be At Least 6 Characters',
            'email.required'        => 'Email Is Required',
            'email.email'           => 'Email Is Invalid',
            'email.unique'          => 'This Email Already Exists',
            'password.required'     => 'Password Is Required',
            'password.min'          => 'The Password Must Be At Least 8 Characters'
        ];
    }
}
