<?php

namespace App\Http\Requests;

use App\Rules\QuantityValidation;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                    'unique:products,name',
                    'string',
                    'min:3',
                    'max:255'
                ],
                'name_ar' => [
                    'required',
                    'unique:products,name_ar',
                    'string',
                    'min:3',
                    'max:255'
                ],
                'intro' => [
                    'nullable',
                    'string',
                    'min:3',
                    'max:255'
                ],
                'intro_ar' => [
                    'nullable',
                    'string',
                    'min:3',
                    'max:255',
                ],
                'desc'=>[
                    'nullable',
                    'min:5',
                    'max:255',
                    'string',
                ],
                'desc_ar'=>[
                    'nullable',
                    'min:5',
                    'max:255',
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
                  'gallery'=>[
                    'array',
                ],
                 /*'category_id'=>[
                    'required',
                    'exists:categories,id',
                ],*/
                'price'=>[
                    'numeric',
                ],
                'tags'=>[
                    /* 'required', */
                ],
                'qty'=>[
                    'numeric',
                     new QuantityValidation($this->qty,$this->variant),
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
                    'max:255'
                ],
                'name_ar' => [
                    'required',
                    'string',
                    'min:3',
                    'max:255'
                ],
                'intro' => [
                    'nullable',
                    'string',
                    'min:3',
                    'max:255'
                ],
                'intro_ar' => [
                    'nullable',
                    'string',
                    'min:3',
                    'max:255',
                ],
                'desc'=>[
                    'nullable',
                    'min:5',
                    'max:255',
                    'string',
                ],
                'desc_ar'=>[
                    'nullable',
                    'min:5',
                    'max:255',
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
                  'gallery'=>[
                    'array',
                ],
                 /*'category_id'=>[
                    'required',
                    'exists:categories,id',
                ],*/
                'price'=>[
                    'numeric',
                ],
                'tags'=>[
                    /* 'required', */
                ],
                'qty'=>[
                    'numeric',
                     new QuantityValidation($this->qty,$this->variant),
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
            'name.max'=>__('validation.max'),

            'name_ar.required' => __('validation.required'),
            'name_ar.unique'=>__('validation.unique'),
            'name_ar.string'=>__('validation.string'),
            'name_ar.min'=>__('validation.min'),
            'name_ar.max'=>__('validation.max'),


            'intro.required' => __('validation.required'),
            'intro.string'=>__('validation.string'),
            'intro.min'=>__('validation.min'),
            'intro.max'=>__('validation.max'),

            'intro_ar.required' => __('validation.required'),
            'intro_ar.string'=>__('validation.string'),
            'intro_ar.min'=>__('validation.min'),
            'intro_ar.max'=>__('validation.max'),

            'desc.min' => __('validation.min'),
            'desc.max' => __('validation.max'),
            'desc.string'=>__('validation.string'),

            'desc_ar.min'=> __('validation.min'),
            'desc_ar.max'=> __('validation.max'),
            'desc_ar.string'=>__('validation.string'),

            'image.required' => __('validation.required'),
            'image.image' => __('validation.image'),
            'image.mimes' => __('validation.mimes'),


            'gallery.required' => __('validation.required'),
            'gallery.image' => __('validation.image'),

            'category.required' => __('validation.required'),
            'category.exists' => __('validation.exists'),

            'price.numeric' => __('validation.numeric'),

            'qty.numeric' => __('validation.numeric'),

            /* 'tags.required' => __('validation.required'), */

            'status.required' => __('validation.required'),
            'status.in' => __('validation.in'),



        ];
    }
}
