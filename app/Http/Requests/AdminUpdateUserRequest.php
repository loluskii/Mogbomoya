<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminUpdateUserRequest extends FormRequest
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
            'email' => 'required|unique:users,email,'.$this->id,
            'username' => 'required|min:5|max:30|regex:/^\S*$/u|regex:/(^([a-zA-Z]+)(\d+)?$)/u|unique:users,username,'.$this->id,
            'phone_number' => 'nullable|string|unique:users,phone_number,'.$this->id,
            'isActive' => 'nullable|string',
            'isAdmin' => 'nullable|string',
            // 'country' => 'nullable|string',
        ];
    }
}
