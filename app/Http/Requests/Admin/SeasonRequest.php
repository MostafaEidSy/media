<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SeasonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title'             => 'required',
            'image'             => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'video'             => 'required|array',
            'show'              => 'required|numeric',
            'duration'          => 'required|string',
            'date_season'       => 'required|date',
            'description'       => 'nullable|string'
        ];
    }
    public function messages(){
        return [
            'title.required'                => 'This Field Is Required',
            'image.image'                   => 'This field should be an image only',
            'image.mimes'                   => 'Sorry, The Image Extension Is Not Supported. The Supported Extensions Are jpg, png, jpeg, gif Only',
            'video.required'                => 'This Field Is Required',
            'video.array'                   => 'Sorry, There Is An Error In The Data Sent',
            'show.required'                 => 'This Field Is Required',
            'show.numeric'                  => 'Sorry, There Is An Error In The Data Sent',
            'duration.required'             => 'This Field Is Required',
            'duration.string'               => 'This Field Must Be Letters Only',
            'date_season.required'          => 'This Field Is Required',
            'date_season.date'              => 'This Field Must Be Date Only',
            'description.string'            => 'This Field Must Be Letters Only'
        ];
    }
}
