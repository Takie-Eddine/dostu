<?php

namespace App\Http\Requests\Client;

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
            'product_name' => 'exists:store_product_translations,name|nullable',
            'price' => 'nullable|min:0|numeric',
            'qty' => 'nullable|min:1|numeric',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'email|nullable',
            'city' => 'required',
            'country' => 'required',
            'postal_code' => 'nullable',
            'address' => 'required',
            'type' => 'required|in:shipping,billing',
        ];
    }
}
