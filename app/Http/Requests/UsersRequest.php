<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
       // dd($this->method());
       
        $store=
        [
        'string',
        'nullable',
        ];
        $id = $this->route('id');
        if($this->method() == "POST")
        {
            $store[]= 'required';
        }
        return [
                'user_name' => [
                'required',
                'string',
                'min:3',
            ],
            'store_id' => $store,
            'email'=>[
                'required',
                'unique:users,email,'.$id,
                'email',
            ],
            'password'=>[
                'sometimes',
                'required',
                'string',
                'min:8',               
            ],             
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => __('validation.required'),
            'user_name.string'=>__('validation.string'),
            'user_name.min'=>__('validation.min'),

            'store_id.required' => __('validation.required'),
            'store_id.exists'=>__('validation.min'),

            'email.required' => __('validation.required'),
            'email.exists' => __('validation.exists'),
            'email.string'=>__('validation.string'),
            'email.min'=>__('validation.min'),

            'password.required' => __('validation.required'),
            'password.string'=>__('validation.string'),
        ];
    }
}


