<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'store_name' => 'required|max:100|unique:stores,store_name,'.$this->id,
            'store_email' => 'required|email|unique:stores,store_email,'.$this->id,
            'store_mobile' => 'required|unique:stores,store_mobile,'.$this->id,
            'store_logo' => 'required_without:id',
            'country'=>'required',
            'city'=>'required',
            'state'=>'required',
            'pincode'=>'required|numeric',
            'address'=>'required',
        ];
    }
}
