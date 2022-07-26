<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'store_name' => 'required|max:100|unique:stores',
            'store_email' => 'required|email|unique:stores',
            'store_mobile' => 'required|unique:stores',
            'store_logo' => 'required|mimes:jpg,jpeg,png',
            'image' => 'required|mimes:jpg,jpeg,png',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|unique:clients',
            'email' => 'required|email|unique:clients',
            'username' => 'required|unique:clients',
            'plans' => 'required',
            'addCard' => 'required',
            'card_name' => 'required',
            'card_exp' => 'required',
            'cvv' => 'required',
        ];
    }
}
