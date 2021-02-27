<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ManageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'                  => 'required|min:6',
            'avatar'                => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'date_of_birth'         => 'nullable|date',
            'gender'                => 'nullable|in:Male,Female',
            'language'              => 'nullable|string',
            'email'                 => 'required|email|unique:users,email,' . $this->id,
            'password'              => 'nullable|min:8',
            'abstract'              => 'nullable|string'
        ];
    }
    public function messages(){
        return [
            'name.required'                 => 'This Field Is Required',
            'name.min'                      => 'The Full Name Must Be At Least 6 Characters',
            'avatar.image'                  => 'This field should be an image only',
            'avatar.mimes'                  => 'Sorry, The Image Extension Is Not Supported. The Supported Extensions Are jpg, png, jpeg, gif Only',
            'date_of_birth.date'            => 'This Field Must Be Date Only',
            'gender.in'                     => 'Please choose one of the two values without tampering with the data',
            'language.string'               => 'This Field Must Be Letters Only',
            'email.required'                => 'Email Is Required',
            'email.email'                   => 'Email Is Invalid',
            'email.unique'                  => 'This Email Already Exists',
            'password.min'                  => 'The Password Must Be At Least 8 Characters',
            'abstract.string'               => 'This Field Must Be Letters Only'
        ];
    }
}
