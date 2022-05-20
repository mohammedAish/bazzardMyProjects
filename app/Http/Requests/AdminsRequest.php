<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminsRequest extends FormRequest
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
        }
        else   $password=[
                            'sometimes',
                            'string',
                            'min:8',
                      ];
        $id = $this->route('id');
        return [
            'user_name' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'email'=>[
                'required',
                'unique:users,email,'.$id,
                'email',
            ],
            'password'=>[
                $password           
            ],            
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => __('validation.required'),
            'user_name.string'=>__('validation.string'),
            'user_name.min'=>__('validation.min'),

            'email.required' => __('validation.required'),
            'email.string'=>__('validation.string'),
            'email.min'=>__('validation.min'),

            'password.required' => __('validation.required'),
            'password.string'=>__('validation.string'),
            'password.min'=>__('validation.min'),



        ];
    }
}
