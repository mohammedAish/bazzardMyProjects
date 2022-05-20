<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'first_name' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'last_name' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'address'=>[
                'required',
                'max:255',
                'string',
            ],

            'email'=>[
                'required',
                'email',
            ],
            'phone'=>[
                'numeric',
                'required',
                /*'regex:/^(059|056)([0-9]{7})$/',
                'unique:customers,phone,',*/
               /*  'regex:\+(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|
                2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|
                4[987654310]|3[9643210]|2[70]|7|1)\d{1,14}$' */
            ],
            'city'=>[
                'required',
                'string',
                'max:45',
            ],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => __('validation.required'),
            'first_name.string'=>__('validation.string'),
            'first_name.min'=>__('validation.min'),
            'first_name.max'=>__('validation.max'),

            'first_name_ar.required' => __('validation.required'),
            'first_name_ar.string'=>__('validation.string'),
            'first_name_ar.min'=>__('validation.min'),
            'first_name_ar.max'=>__('validation.max'),

            'last_name.required' => __('validation.required'),
            'last_name.min' => __('validation.min'),
            'last_name.max' => __('validation.max'),
            'last_name.string'=>__('validation.string'),

            'last_name_ar.required' => __('validation.required'),
            'last_name_ar.min'=> __('validation.min'),
            'last_name_ar.max'=> __('validation.max'),
            'last_name_ar.string'=>__('validation.string'),

            'address.max' => __('validation.max'),
            'address.string' => __('validation.string'),

            'address_ar.max' => __('validation.max'),
            'address.string' => __('validation.string'),

            'email.required' => __('validation.required'),
            'email.email' => __('validation.email'),

            'phone.required'=>__('validation.required'),
            'phone.numeric' => __('validation.numeric'),
            'phone.regex' => __('validation.regex'),
            'phone.unique' => __('validation.unique'),

            'country.required' => __('validation.required'),
            'country.string'=>__('country.string'),
            'country.max' => __('validation.max'),
            
        ];
    }
}
