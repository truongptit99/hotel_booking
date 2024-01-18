<?php

namespace App\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
            'name' => 'required|string|max:200|unique:rooms,name,' . $this->room,
            'slug' => 'required|string|max:255|unique:rooms,slug,' . $this->room,
            'image' => 'nullable|image|max:10000',
            'type' => 'required|integer',
            'price' => 'required|numeric|gt:0',
            'max_adult' => 'required|integer|min:1|max:10',
            'max_children' => 'nullable|integer|min:0|max:5',
            'description' => 'nullable|string',
        ];
    }
}
