<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
                'required',
                'numeric',
                //'regex:/^(059|056)([0-9]{7})$/',
                'unique:customers,phone,'.$id,

            ],
            'city'=>[
                'required',
                'exists:cities,city_id'
            ],

            'postal_code'=>[
                'required',
                'numeric',
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

            'last_name.string'=>__('validation.string'),
            'last_name.min' => __('validation.min'),
            'last_name.max' => __('validation.max'),

            'last_name_ar.string'=>__('validation.string'),
            'last_name_ar.min'=> __('validation.min'),
            'last_name_ar.max'=> __('validation.max'),

            'address.max' => __('validation.max'),
            'address.string' => __('validation.string'),


            'address_ar.max' => __('validation.max'),
            'address.string' => __('validation.string'),


            'email.required' => __('validation.required'),
            'email.email' => __('validation.email'),


            'phone.numeric' => __('validation.numeric'),
            'phone.regex' => __('validation.regex'),
            'phone.unique' => __('validation.unique'),


            'city.required' => __('validation.required'),
            'city.exists' => __('validation.exists'),

            'postal_code.numeric' => __('validation.numeric'),

        ];
    }
}
