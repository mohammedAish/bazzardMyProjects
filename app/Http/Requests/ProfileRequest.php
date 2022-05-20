<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'full_name' => [
                'string',
                'min:3',
                'max:255',
                'nullable',
            ],
            'email'=>[
                'required',
                'email',
            ],
            'avatar'=>[
                'nullable',
                'image',
                'max:1048576',
                'dimensions:min_width=200,min_height=200'
            ],
            'birthday'=>[
                'string',
                'before:today',
                'nullable',
            ],
            'country'=>[
                'string',
                'nullable',
            ],
            'phone_number'=>[
                'regex:/^(059|056)([0-9]{7})$/',
                'nullable',
            ],
            'address'=>[
                'string',
                'min:3',
                'max:255',
                'nullable',
            ],
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => __('validation.required'),
            'user_name.string'=>__('validation.string'),
            'user_name.min'=>__('validation.min'),
            'user_name.max'=>__('validation.max'),

            'full_name.string'=>__('validation.string'),
            'full_name.min'=>__('validation.min'),
            'full_name.max'=>__('validation.max'),

            'avatar.image'=>__('validation.image'),
            'avatar.max'=>__('validation.max'),
            'avatar.dimensions'=>__('validation.dimensions'),

            'email.required' => __('validation.required'),
            'email.string'=>__('validation.string'),
            'email.min'=>__('validation.min'),

            'password.required' => __('validation.required'),
            'password.string'=>__('validation.string'),

            'birthday.string'=>__('validation.string'),
            'birthday.date_format'=>__('validation.date_format'),
            'birthday.before'=>__('validation.before'),

            'country.string'=>__('validation.string'),

            'phone_number.regex'=>__('validation.min'),

            'address.string'=>__('validation.string'),
            'address.min'=>__('validation.min'),
            'address.max'=>__('validation.max'),
        ];
    }
}
