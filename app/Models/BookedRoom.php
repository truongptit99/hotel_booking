<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedRoom extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'room_id', 'check_in', 'check_out', 'price', 'adults', 'children'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function getListRoomIdBooked($startDate, $endDate)
    {
        return $this->where('check_out', '>', $startDate)
            ->where('check_in', '<', $endDate)
            ->whereHas('booking', function ($q) {
                $q->where('payment_status', config('constants.payment_status.success'));
            })
            ->distinct()
            ->pluck('room_id')
            ->toArray();
    }

    public function checkAvailability($data)
    {
        $bookedRoom = $this->where('room_id', $data['room_id'])
            ->where('check_in', '<', $data['check_out'])
            ->where('check_out', '>', $data['check_in'])
            ->whereHas('booking', function ($q) {
                $q->where('payment_status', config('constants.payment_status.success'));
            })
            ->first();

        if (empty($bookedRoom)) {
            return true;
        }

        return false;
    }

    public function createNewBookedRoom($attributes)
    {
        return $this->create($attributes);
    }
}
