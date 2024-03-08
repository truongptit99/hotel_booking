<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingModel;

    public function __construct(Booking $bookingModel) {
        $this->bookingModel = $bookingModel;
    }

    public function index()
    {
        return view('admin.bookings.index');
    }

    public function getListBooking(Request $request)
    {
        return $this->bookingModel->getList($request);
    }
}
