<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required|string|max:100|regex:/^([a-zA-Z0-9-_\s+]+)$/',
            'last_name' => 'required|string|max:100|regex:/^([a-zA-Z0-9-_\s+]+)$/',
            'email' => 'required|string|max:255|unique:users,email|regex:/^([a-z0-9+_]+)(\.[a-z0-9+_-]+)*@[a-z0-9]([a-z0-9-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string|min:8|max:32|confirmed',
            'password_confirmation' => 'required|string|min:8|max:32',
        ];
    }
}
