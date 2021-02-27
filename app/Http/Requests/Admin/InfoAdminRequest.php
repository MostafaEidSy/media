<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InfoAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'first_name'            => 'required|string',
            'last_name'             => 'required|string',
            'username'              => 'required|unique:admins,username,' . $this->id,
            'avatar'                => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'city'                  => 'nullable|string',
            'date_of_birth'         => 'nullable|date',
            'age'                   => 'nullable|numeric',
            'country'               => 'nullable|string',
            'address'               => 'nullable|string'
        ];
    }
    public function messages(){
        return [
            'first_name.required'                => 'First Name Is Required',
            'first_name.string'                  => 'This Field Must Be Letters Only',
            'last_name.required'                 => 'Last Name Is Required',
            'last_name.string'                   => 'This Field Must Be Letters Only',
            'username.required'                  => 'Username Is Required',
            'username.unique'                    => 'Sorry, Username Already Exists',
            'avatar.image'                       => 'This field should be an image only',
            'avatar.mimes'                       => 'Sorry, The Image Extension Is Not Supported. The Supported Extensions Are jpg, png, jpeg, gif Only',
            'city.string'                        => 'This Field Must Be Letters Only',
            'date_of_birth.date'                 => 'This Field Must Be Date Only',
            'age.numeric'                        => 'This Field Must Be Number Only',
            'country.string'                     => 'This Field Must Be Letters Only',
            'address.string'                     => 'This Field Must Be Letters Only',
        ];
    }
}
