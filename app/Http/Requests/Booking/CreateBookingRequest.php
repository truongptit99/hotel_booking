<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookingRequest extends FormRequest
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
            'room_id' => 'required|integer',
            'room_name' => 'required|string',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone_number' => 'required|numeric|digits_between:1,15',
            'email' => 'required|max:255|regex:/^([a-z0-9+_]+)(\.[a-z0-9+_-]+)*@[a-z0-9]([a-z0-9-]+\.)+[a-z]{2,6}$/',
            'address' => 'required|string|max:255',
            'zip_code' => 'required|numeric|digits_between:1,10',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1|max:10',
            'children' => 'nullable|integer|min:0|max:5',
            'price' => 'required|numeric|gt:0',
            'total_price' => 'required|numeric|gt:0',
        ];
    }
}
