<?php

namespace App\Http\Requests\Supplier;

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
        return [
            'name' => 'required|max:300',
            'company_id'=>'exists:supplier_companies,id',
            'slug' => 'required|unique:products,slug',
            'description' => 'required|min:150',
            //'title' => 'required|max:500',
            'categories' => 'array|min:1', //[]
            'categories.*' => 'numeric|exists:categories,id',
            'tags' => 'nullable',
            'sku' => 'nullable|min:3|max:10',
            'price' => 'required|min:0|numeric',
            'qty' => 'required',
            'photo' => 'required|array|min:1',
            //'photo.*' => 'required|string',

        ];
    }
}
