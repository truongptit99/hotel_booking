<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct() {
        
    }

    public function getBookingSystem()
    {
        $room = session('room');

        return view('client.booking.booking_system', ['room' => $room]);
    }
}
