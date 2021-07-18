<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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

    public function rules(): array
    {
        return [
            'name' => 'required|regex:/^\S*$/u|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'email' => 'required|unique:users|regex:/^\S*$/u|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'username' => 'required|unique:users|regex:/^\S*$/u|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'phone_number' => 'required|unique:users',
            'password' => 'required'
        ];
    }
}
