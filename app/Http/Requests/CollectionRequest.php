<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionRequest extends FormRequest
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
            'warranty' => 'required',
            'weight' => 'required',
            'size' => 'required',
            'length_of_sheets' => 'required',
            'quantity_of_sheets' => 'required',
            'quantity_of_boxes' => 'required',
            'protrusion' => 'required',
            'wind_min' => 'required',
            'wind_max' => 'required',
            'angle' => 'required',
            'description' => 'required',
            'description_title' => 'required',
            'name' => 'required',
        ];
    }
}
