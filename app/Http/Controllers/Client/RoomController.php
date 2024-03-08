<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\CheckAvailabilityRoomRequest;
use App\Http\Requests\Room\SearchRoomRequest;
use App\Models\BookedRoom;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    protected $roomModel;
    protected $bookedRoomModel;

    public function __construct(Room $roomModel, BookedRoom $bookedRoomModel)
    {
        $this->roomModel = $roomModel;
        $this->bookedRoomModel = $bookedRoomModel;
    }

    public function searchRoom(SearchRoomRequest $request)
    {
        $listRoomIdBooked = [];
        if (!empty($request->check_in) && !empty($request->check_out)) {
            $startDate = date('Y-m-d', strtotime($request->check_in));
            $endDate = date('Y-m-d', strtotime($request->check_out));
            session(['start_date' => $startDate, 'end_date' => $endDate]);
            $listRoomIdBooked = $this->bookedRoomModel->getListRoomIdBooked($startDate, $endDate);
        }

        $listRoom = $this->roomModel->searchRoom($request, $listRoomIdBooked);  

        return response()->json([
            'view' => view('client.rooms.room_list', ['listRoom' => $listRoom])->render()
        ]);
    }

    public function getRoomDetail($slug)
    {
        $room = $this->roomModel->findBySlug($slug);

        if (!empty($room)) {
            return view('client.rooms.room_detail', ['room' => $room]);
        }

        abort(404);
    }

    public function checkAvailability(CheckAvailabilityRoomRequest $request)
    {
        $data = $request->validated();

        $room = $this->roomModel->findById($data['room_id']);
        session(['room' => $room]);

        if ((!empty($room->max_adult) && ($room->max_adult < $data['adult'])) || 
            (!empty($room->max_children) && !empty($data['children']) && ($room->max_children < $data['children']))) {
                return back()->with(['alert-type' => 'warning', 'message' => 'The number of adults or children exceeds the allowed number!']);
        }
        
        $check = $this->bookedRoomModel->checkAvailability($data);

        if ($check) {
            session([
                'check_in' => $data['check_in'],
                'check_out' => $data['check_out'],
                'number_night' => Carbon::parse($data['check_in'])->diffInDays(Carbon::parse($data['check_out'])),
                'adult' => $data['adult']
            ]);
            if (!empty($data['children'])) {
                session(['children' => $data['children']]);
            }

            return redirect()->route('get.booking.system');
        }

        return back()->with(['alert-type' => 'warning', 'message' => 'This room is not available!']);
    }
}
