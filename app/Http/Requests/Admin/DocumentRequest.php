<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'                  => 'required',
            'document_name'         => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'                    => 'This Field Is Required',
            'document_name.required'           => 'This Field Is Required',
        ];
    }
}
