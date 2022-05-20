<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MerchantRequest extends FormRequest
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
        if($this->method() =="POST")
        {
            $password= [ 'sometimes',
                        'required',
                        'string',
                        'min:8',
                    ];

            $slug=[
                'required',
                'unique:stores,slug',
                'string',
                'min:3',
                'max:255',
            ];
        }
        else{
           $password=[
                            'sometimes',
                            'string',
                            'min:8',
                      ];
            $slug=[
            'required',
            'unique:stores,slug',
            'string',
            'min:3',
            'max:255',
                ];
                    }
        $id = $this->route('id');
        return [
            'user_name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'email'=>[
                'required',
                'unique:users,email,'.$id,
                'email',
            ],
            'password'=>[
               $password
            ],
            'slug'=>[
               $slug
            ],
            'status'=>[
                'in:active,inactive', 
            ] ,   
            
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => __('validation.required'),
            'user_name.string'=>__('validation.string'),
            'user_name.min'=>__('validation.min'),
            'user_name.max'=>__('validation.max'),

            'name.required' => __('validation.required'),
            'name.string'=>__('validation.string'),
            'name.min'=>__('validation.min'),
            'name.max'=>__('validation.max'),


            'email.required' => __('validation.required'),
            'email.exists' => __('validation.exists'),
            'email.string'=>__('validation.string'),
            'email.min'=>__('validation.min'),

            'password.required' => __('validation.required'),
            'password.string'=>__('validation.string'),

            'slug.required' => __('validation.required'),
            'slug.string'=>__('validation.string'),
            'slug.min'=>__('validation.min'),
            'slug.min'=>__('validation.max'),
            'slug.unique'=>__('validation.unique'),

        ];
    }
}
