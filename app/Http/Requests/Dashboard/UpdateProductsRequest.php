<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductsRequest extends FormRequest
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
            'barcode' => 'required',
            'name' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',

        ];
    }
}
