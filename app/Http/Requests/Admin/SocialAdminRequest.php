<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SocialAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'facebook'          => 'nullable|url',
            'twitter'           => 'nullable|url',
            'google_plus'       => 'nullable|url',
            'instagram'         => 'nullable|url',
            'youtube'           => 'nullable|url',
        ];
    }
    public function messages(){
        return [
            'facebook.url'              => 'This Field Should Be a Link Only',
            'twitter.url'               => 'This Field Should Be a Link Only',
            'google_plus.url'           => 'This Field Should Be a Link Only',
            'instagram.url'             => 'This Field Should Be a Link Only',
            'youtube.url'               => 'This Field Should Be a Link Only'
        ];
    }
}
