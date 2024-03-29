<?php

namespace App\Http\Requests\User;

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
            'first_name' => 'required|string|max:100|regex:/^([a-zA-Z0-9-_\s+]+)$/',
            'last_name' => 'required|string|max:100|regex:/^([a-zA-Z0-9-_\s+]+)$/',
        ];
    }
}
