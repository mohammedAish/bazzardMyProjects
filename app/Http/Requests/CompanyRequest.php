<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
           

            'company_name' => [
                'required',
                'string',
            ],
            'company_id' => [
                'required',
                'numeric',
            ],
        ];

        return [
            'company_name.required' => __('validation.required'),
            'company_name.string'=>__('validation.string'),
            
            'company_id.required' => __('validation.required'),
            'company_id.string'=>__('validation.numeric'),
        ];
    }
}
