<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_id'=>[
                'required',
                'exists:customers,id'
            ],
            'product_id'=>[
                'required',
                'exists:products,id'
            ],
            'quantity'=>[
                'required',
                'numeric'
            ],
            'status'=>[
                'required',
                'in:pending,processing,in-delivery,completed',
            ],
            'size'=>[
                'required',
            ],
            'color'=>[
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required' => __('validation.required'),

            'quantity.numeric' => __('validation.numeric'),
            'quantity.required'=> __('validation.required'),

            'image.image' => __('validation.image'),
            'image.mimes' => __('validation.mimes'),


            'status.required' => __('validation.required'),
            'status.in' => __('validation.in'),
        ];
    }
}
