<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryVideoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'          => 'required|string',
            'description'   => 'nullable|string',
            'status'        => 'required|in:0,1',
            'slug'          => 'required|unique:category_videos,slug' . $this->id
        ];
    }
    public function messages(){
        return [
            'name.required'             => 'Name Is Required',
            'name.string'               => 'This Field Must Be Letters Only',
            'description.string'        => 'This Field Must Be Letters Only',
            'status.required'           => 'Status Is Required',
            'status.in'                 => 'Sorry, There Is An Error In The Data Sent',
        ];
    }
}
