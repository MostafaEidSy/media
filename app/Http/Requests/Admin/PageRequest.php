<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'              => 'required|string',
            'content'           => 'nullable',
            'slug'              => 'required|string|unique:pages,slug,' . $this->id,
            'in_footer'         => 'required|in:0,1,2,3'
        ];
    }
    public function messages(){
        return [
            'name.required'             => 'This Field Is Required',
            'name.string'               => 'This Field Must Be Letters Only',
            'slug.required'             => 'This Field Is Required',
            'slug.string'               => 'This Field Must Be Letters Only',
            'slug.unique'               => 'This Value Already Exists',
            'in_footer.required'        => 'This Field Is Required',
            'in_footer.in'              => 'Sorry, There Is An Error In The Data Sent',
        ];
    }
}
