<?php

namespace App\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;

class CheckAvailabilityRoomRequest extends FormRequest
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
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adult' => 'required|integer|min:1|max:10',
            'children' => 'nullable|integer|min:0|max:5',
        ];
    }
}
