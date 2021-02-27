<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'email'                 => 'required|email',
            'password'              => 'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            'email.required'        => 'Email Is Required',
            'email.email'           => 'Email Is Invalid',
            'password.required'     => 'Password Is Required',
            'password.min'          => 'The Password Must Be At Least 8 Characters'
        ];
    }
}
