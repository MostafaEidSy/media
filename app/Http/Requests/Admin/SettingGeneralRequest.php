<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingGeneralRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'site_name'             => 'required|string',
            'website_link'          => 'required|url',
            'website_logo'          => 'image|mimes:png',
            'website_icon'          => 'image|mimes:png',
            'website_loader'        => 'image|mimes:gif'
        ];
    }
    public function messages(){
        return [
            'site_name.required'            => 'This Field Is Required',
            'site_name.string'              => 'This Field Must Be Letters Only',
            'website_link.required'         => 'This Field Is Required',
            'website_link.url'              => 'This Field Must Be Url Only',
            'website_logo.image'            => 'This field should be an image only',
            'website_logo.mimes'            => 'Sorry, The Image Extension Is Not Supported. The Supported Extensions Are "png" Only',
            'website_icon.image'            => 'This field should be an image only',
            'website_icon.mimes'            => 'Sorry, The Image Extension Is Not Supported. The Supported Extensions Are "png" Only',
            'website_loader.image'          => 'This field should be an image only',
            'website_loader.mimes'          => 'Sorry, The Image Extension Is Not Supported. The Supported Extensions Are "gif" Only',
        ];
    }
}
