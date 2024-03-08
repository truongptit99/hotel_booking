<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\CreateBookingRequest;
use App\Models\BookedRoom;
use App\Models\Booking;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\StripeClient;

class BookingController extends Controller
{
    protected $bookedRoomModel;
    protected $bookingModel;

    public function __construct(BookedRoom $bookedRoomModel, Booking $bookingModel) {
        $this->bookedRoomModel = $bookedRoomModel;
        $this->bookingModel = $bookingModel;
    }

    public function getBookingSystem()
    {
        $room = session('room');

        return view('client.booking.booking_system', ['room' => $room]);
    }

    public function submitBooking(CreateBookingRequest $request)
    {
        $data = $request->validated();

        $check = $this->bookedRoomModel->checkAvailability($data);

        if ($check) {
            DB::beginTransaction();
            try {
                $booking  = $this->bookingModel->createNewBooking([
                    'user_id' => Auth::id(),
                    'contact_first_name' => $data['first_name'],
                    'contact_last_name' => $data['last_name'],
                    'phone_number' => $data['phone_number'],
                    'email' => $data['email'],
                    'address' => $data['address'],
                    'zip_code' => $data['zip_code'],
                    'total_price' => $data['total_price'],
                    'payment_status' => config('constants.payment_status.pending'),
                ]);

                $bookedRoom = $this->bookedRoomModel->createNewBookedRoom([
                    'booking_id' => $booking->id,
                    'room_id' => $data['room_id'],
                    'check_in' => $data['check_in'],
                    'check_out' => $data['check_out'],
                    'price' => $data['price'],
                    'adults' => $data['adults'],
                    'children' => !empty($data['children']) ? $data['children'] : null,
                ]);

                DB::commit();

                $stripe = new StripeClient(env('STRIPE_SECRET'));

                $price = $stripe->prices->create([
                    'currency' => 'usd',
                    'unit_amount' => $data['total_price'] * 100,
                    'product_data' => ['name' => 'Payment for booking ' . $data['room_name'] . ' room' ]
                ]);
        
                $checkoutSession = $stripe->checkout->sessions->create([
                    'success_url' => route('update.payment.status.success', $booking->id),
                    'cancel_url' => route('get.booking.system'),
                    'line_items' => [
                        [
                            'price' => $price->id,
                            'quantity' => 1,
                        ],
                    ],
                    'mode' => 'payment',
                    'expires_at' => time() + 1800,
                ]);

                return redirect($checkoutSession->url);
            } catch (Exception $e) {
                DB::rollBack();

                return back()->with(['alert-type' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
            }
        }

        return back()->with(['alert-type' => 'warning', 'message' => 'This room is not available!']);
    }
}
