<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $id = $this->route('id');
        $step = $this->get('step');
        $validate_rules = [
            1 => [
                    'name' => [
                        'required',
                        'string',
                        'min:3',
                        'max:255',
                    ],
                    'slug'=>[
                        'required',
                        'unique:stores,slug',
                        'string',
                        'min:3',
                        'max:255',
                    ],
                    'email'=>[
                        'required',
                        'unique:users,email',
                        'email',
                    ],
                    'password'=>[
                        'sometimes',
                        'required',
                        'string',
                        'min:8',
                    ],
                    /*'phone' => [
                        'regex:/^(059|056)([0-9]{7})$/',

                    ],*/
                    'user_name' => [
                        'string',
                        'min:3',
                        'max:255',
                    ]
                ],
                2 => [
                    'how_sell_products' => [
                        'string',
                        'required',
                       // 'exists:currently_sells,id',
                    ]
                ],
                3 => [
                    'what_going_sell' => [
                        'string',
                        'required',
                    ]
                ],
                4 => [
                    'business_registered'=>[
                        'string',
                        'required',
                    ]
                ]
        ];

        return data_get($validate_rules, $step, []);
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required'),
            'name.string'=>__('validation.string'),
            'name.min'=>__('validation.min'),
            'name.max'=>__('validation.max'),

            'slug.required' => __('validation.required'),
            'slug.string'=>__('validation.string'),
            'slug.min'=>__('validation.min'),
            'slug.max'=>__('validation.min'),
            'slug.unique'=>__('validation.unique'),

            'user_name.string'=>__('validation.string'),
            'user_name.min'=>__('validation.min'),
            'user_name.max'=>__('validation.max'),


            'email.required' => __('validation.required'),
            'email.exists' => __('validation.exists'),
            'email.string'=>__('validation.string'),
            'email.min'=>__('validation.min'),

            'phone.string'=>__('validation.min'),
            'phone.numeric'=>__('validation.numeric'),
            'phone.regex'=>__('validation.regex'),


            'password.required' => __('validation.required'),
            'password.string'=>__('validation.string'),

            'how_sell_products.string'=>__('validation.string'),
            'how_sell_products.required'=>__('validation.required'),
            'how_sell_products.exists'=>__('validation.exists'),

            'what_going_sell.string'=>__('validation.string'),
            'what_going_sell.required'=>__('validation.required'),

            'business_registered.string'=>__('validation.string'),
            'business_registered.required'=>__('validation.required'),
        ];


    }
}
