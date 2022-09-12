<?php

namespace App\Http\Requests\Client;

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
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            //'role_id' => 'required|numeric|exists:roles,id',
            'email' => 'required|email|unique:clients,email,'.$this -> id,
            'password'  => 'required_without:id|confirmed',
            // 'photo'=>'required_without:id',
            // 'photo.*' => 'mimes:jpg,jpeg,png',
        ];
    }
}
