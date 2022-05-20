<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatogeryRequest extends FormRequest
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
            return [
                'name' => [
                    'required',
                    'unique:categories,name',
                    'string',
                    'min:3',
                ],
                'name_ar' => [
                    'required',
                    'unique:categories,name_ar',
                    'string',
                    'max:255'
                ],
                'desc'=>[
                    'nullable',
                    'min:5',
    
                    'string',
                ],
                'desc_ar'=>[
                    'nullable',
                    'min:5',
    
                    'string',
                ],
                'parent_id'=>[
                    'nullable',
                    'exists:categories,id',
                ],
                'image'=>[
                    'required',
                    'image',
                    'mimes:png,jpg,jpeg,gif',
    
                ],
                'status'=>[
                    'required',
                    'in:active,inactive',
                ],
            ];
        }

        else{
            return [
                'name' => [
                    'required',
                    'string',
                    'min:3',
                ],
                'name_ar' => [
                    'required',
                    'string',
                    'max:255'
                ],
                'desc'=>[
                    'nullable',
                    'min:5',
    
                    'string',
                ],
                'desc_ar'=>[
                    'nullable',
                    'min:5',
    
                    'string',
                ],
                'parent_id'=>[
                    'nullable',
                    'exists:categories,id',
                ],
                'image'=>[
                    'image',
                    'mimes:png,jpg,jpeg,gif',
    
                ],
                'status'=>[
                    'required',
                    'in:active,inactive',
                ],
            ];
        }
        
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required'),
            'name.unique'=>__('validation.unique'),
            'name.string'=>__('validation.string'),
            'name.min'=>__('validation.min'),
            'name.min'=>__('validation.min'),

            'name_ar.required' => __('validation.required'),
            'name_ar.unique'=>__('validation.unique'),
            'name_ar.string'=>__('validation.string'),
            'name_ar.max'=>__('validation.max'),

            'desc.max' => __('validation.max'),
            'desc.string'=>__('validation.string'),

            'desc_ar.max'=> __('validation.max'),
            'desc_ar.string'=>__('validation.string'),

            'image.required' => __('validation.required'),
            'image.image' => __('validation.image'),
            'image.mimes' => __('validation.mimes'),

            'status.required' => __('validation.required'),
            'status.in' => __('validation.in'),
        ];
    }
}
