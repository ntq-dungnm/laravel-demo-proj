<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'title' => 'required',
            'descriptions'   => 'required',
            'manufacturer_name' => 'required',
            'manufacturer_brand' => 'required',
            'stocks'    => 'required|numeric',
            'price'    => 'required|numeric',
            'discount'    => 'required|numeric',
            'orders'    => 'required|numeric',
        ];
    }
}
