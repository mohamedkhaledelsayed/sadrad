<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateCarRequest extends FormRequest
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|required',
            "brand_car"=>"required",
            "type_carid"=>"required",
            'model'=>'numeric',
            'maximum_weight'=>'nullable',
            'number_of_persons'=>'numeric',
            'Aircondtion'=>'boolean',
            'language'=>'required',
        ];
    }
}
