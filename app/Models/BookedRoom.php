<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedRoom extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'room_id', 'check_in', 'check_out', 'price'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getListRoomIdBooked($startDate, $endDate)
    {
        return $this->where('check_out', '>', $startDate)
            ->where('check_in', '<', $endDate)
            ->distinct()
            ->pluck('room_id')
            ->toArray();
    }

    public function checkAvailability($data)
    {
        $bookedRoom = $this->where('room_id', $data['room_id'])
            ->where('check_in', '<', $data['check_out'])
            ->where('check_out', '>', $data['check_in'])
            ->first();

        if (empty($bookedRoom)) {
            return true;
        }

        return false;
    }
}
