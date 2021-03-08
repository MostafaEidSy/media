<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title'                 => 'required',
            'image'                 => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'category'              => 'nullable|numeric',
            'quality'               => 'required',
            'description'           => 'nullable|string',
            'release'               => 'required|numeric',
            'language'              => 'required|string',
            'duration'              => 'required',
            'video_name'            => 'required',
            'slug'                  => 'required|unique:videos,slug' . $this->id
        ];
    }
    public function messages(){
        return [
            'title.required'                    => 'This Field Is Required',
            'image.required'                    => 'This Field Is Required',
            'image.image'                       => 'This field should be an image only',
            'image.mimes'                       => 'Sorry, The Image Extension Is Not Supported. The Supported Extensions Are jpg, png, jpeg, gif Only',
            'category.numeric'                  => 'Sorry, There Is An Error In The Data Sent',
            'quality.required'                  => 'This Field Is Required',
            'description.string'                => 'This Field Must Be Letters Only',
            'release.required'                  => 'This Field Is Required',
            'release.numeric'                   => 'This Field Must Be Number Only',
            'language.required'                 => 'This Field Is Required',
            'language.string'                   => 'This Field Must Be Letters Only',
            'duration.required'                 => 'This Field Is Required',
            'video_name.required'               => 'This Field Is Required',
            'slug.required'                     => 'This Field Is Required',
            'slug.unique'                       => 'This Value Already Exists'
        ];
    }
}
