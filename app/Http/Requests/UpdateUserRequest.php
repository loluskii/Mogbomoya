<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'name' => 'required',
            // 'email' => 'required|unique:users,email,'.Auth::id(),
            'username' => 'nullable|string|min:5|max:30|regex:/^\S*$/u|regex:/(^([a-zA-Z]+)(\d+)?$)/u|unique:users,username,'.Auth::id(),
            'phone_number' => 'nullable|string|unique:users,phone_number,'.Auth::id(),
            'country' => 'nullable|string',
            'interests' => 'nullable|array',
        ];
    }
}
