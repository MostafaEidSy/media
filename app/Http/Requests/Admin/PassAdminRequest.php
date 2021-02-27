<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PassAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'new_password'                  => 'required:min:8',
            'vre_password'                  => 'required|min:8',
        ];
    }
    public function messages(){
        return [
            'new_password.required'          => 'This Field Is Required',
            'vre_password.required'          => 'This Field Is Required',
            'new_password.min'               => 'This Field Must Be At Least 8 Characters Long',
            'vre_password.min'               => 'This Field Must Be At Least 8 Characters Long',
        ];
    }
}
