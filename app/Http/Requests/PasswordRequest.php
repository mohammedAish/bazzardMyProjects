<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'old_password' => [
                'required',
                'string',
                'min:8',
                //'exists:users,password',
            ],
            'new_password' => [
                'required',
                'string',
                'min:8',
                'different:old_password',
                'confirmed',
            ],
            'password_confirmation' => [
                'required',
                'string',
                'min:8',
                'different:old_password',
                'confirmed',
            ],
        ];

        return [
            'old_password.required' => __('validation.required'),
            'old_password.string'=>__('validation.string'),
            'old_password.min'=>__('validation.min'),
            'old_password.exists'=>__('validation.exists'),

            'new_password.required' => __('validation.required'),
            'new_password.string'=>__('validation.string'),
            'new_password.different'=>__('validation.different'),
            'new_password.min'=>__('validation.min'),

            'new_password.required' => __('validation.required'),
            'new_password.string'=>__('validation.string'),
            'new_password.min'=>__('validation.min'),
            'new_password.confirmed'=>__('validation.confirmed'),

        ];
    }
}
