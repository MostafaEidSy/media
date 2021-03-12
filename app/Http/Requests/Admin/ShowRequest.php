<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShowRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title'             => 'required',
            'language'          => 'required|string',
            'category'          => 'nullable|numeric',
            'quality'           => 'required',
            'image'             => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'banner'            => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'description'       => 'nullable|string',
            'slug'              => 'required|unique:shows,slug,' . $this->id
        ];
    }
    public function messages(){
        return [
            'title.required'                    => 'This Field Is Required',
            'language.required'                 => 'This Field Is Required',
            'language.string'                   => 'This Field Must Be Letters Only',
            'category.numeric'                  => 'Sorry, There Is An Error In The Data Sent',
            'quality.required'                  => 'This Field Is Required',
            'image.image'                       => 'This field should be an image only',
            'image.mimes'                       => 'Sorry, The Image Extension Is Not Supported. The Supported Extensions Are jpg, png, jpeg, gif Only',
            'banner.image'                      => 'This field should be an image only',
            'banner.mimes'                      => 'Sorry, The Image Extension Is Not Supported. The Supported Extensions Are jpg, png, jpeg, gif Only',
            'description.string'                => 'This Field Must Be Letters Only',
            'slug.required'                     => 'This Field Is Required',
            'slug.unique'                       => 'This Value Already Exists'
        ];
    }
}
