<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|regex:/^\S*$/u|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'email' => 'required|unique:users,email,'.Auth::user()->id,
            'username' => 'required|string|min:5|max:30|regex:/^\S*$/u|regex:/(^([a-zA-Z]+)(\d+)?$)/u|unique:users,user_data_name,'.Auth::user()->id,
            'phone_no' => 'nullable|unique:users,phone_no,'.Auth::user()->id,
        ];
    }
}
