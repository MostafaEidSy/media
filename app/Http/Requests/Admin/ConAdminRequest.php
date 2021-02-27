<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ConAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'number'            => 'nullable|numeric',
            'email'             => 'required|email|unique:admins,email,' . $this->id,
            'url'               => 'nullable|url',
        ];
    }
    public function messages(){
        return [
            'number.numeric'            => 'This Field Must Be Numbers Only',
            'email.required'            => 'Email Is Required',
            'email.email'               => 'Email Is Invalid',
            'email.unique'              => 'Sorry, Email Already Exists',
            'url.url'                   => 'This Field Should Be a Link Only',
        ];
    }
}
