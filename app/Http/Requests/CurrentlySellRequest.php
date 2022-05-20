<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrentlySellRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'max:255',
                'min:3',
            ],

            'img' => [
                'image',
                'mimes:png,jpg,gif,jpge,svg',
                'max:1048576',
                'dimensions:min_width=200,min_height=200'
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('messages.title_required'),
            'title.string'=>__('validation.string'),
            'title.max'=>__('validation.max'),
            'title.min'=>__('validation.min'),

            'img.image'=>__('validation.image'),
            'img.max'=>__('validation.max'),
            'img.dimensions'=>__('validation.dimensions'),
            'img.mimes'=>__('validation.mimes'),


        ];
    }
}
