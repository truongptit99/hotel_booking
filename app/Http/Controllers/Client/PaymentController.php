<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class PaymentController extends Controller
{
    protected $bookingModel;

    public function __construct(Booking $bookingModel)
    {
        $this->bookingModel = $bookingModel;
    }

    public function updatePaymentStatusSuccess($bookingId)
    {
        $result = $this->bookingModel->updateBooking($bookingId, ['payment_status' => config('constants.payment_status.success')]);

        return redirect()->route('home.index');
    }
}
