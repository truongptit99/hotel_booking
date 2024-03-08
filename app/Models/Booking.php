<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contact_first_name',
        'contact_last_name',
        'phone_number',
        'email',
        'address',
        'zip_code',
        'total_price',
        'payment_status'
    ];

    public function createNewBooking($attributes)
    {
        return $this->create($attributes);
    }

    public function updateBooking($id, $attributes)
    {
        return $this->where('id', $id)->update($attributes);
    }

    public function getList($request)
    {
        $data = $this;
        if (!empty($request->payment_status)) {
            $data = $data->where('payment_status', $request->payment_status);
        }
        $data = $data->orderBy('created_at', 'desc')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('contact_name', function ($data) {
                return $data->contact_first_name . ' ' . $data->contact_last_name;
            })
            ->editColumn('total_price', function ($data) {
                return number_format($data->total_price);
            })
            ->editColumn('payment_status', function ($data) {
                return ucfirst(array_search($data->payment_status, config('constants.payment_status')));
            })
            ->make(true);
    }
}
