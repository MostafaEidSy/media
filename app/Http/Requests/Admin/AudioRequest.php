<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AudioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'              => 'required',
            'audio_name'        => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required'                    => 'This Field Is Required',
            'audio_name.required'              => 'This Field Is Required',
        ];
    }
}
