<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
/*             'name' => [
                'required',
                'string',
            ], */
            'abilities'=>[
                'required',
                'array',
                'min:1'
            ],
        ];
    }

    public function messages()
    {
        return [
            /* 'name.required' => __('validation.required'),
            'name.string'=>__('validation.string'),
 */
            'abilities.required' => __('validation.required'),
            'abilities.string'=>__('validation.string'),
            'abilities.min'=>__('validation.min'),

            

           

        ];
    }
}
