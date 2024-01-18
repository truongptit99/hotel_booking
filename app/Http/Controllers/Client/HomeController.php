<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\SearchRoomRequest;
use App\Models\BookedRoom;
use App\Models\Room;

class HomeController extends Controller
{
    protected $roomModel;
    protected $bookedRoomModel;

    public function __construct(Room $roomModel, BookedRoom $bookedRoomModel)
    {
        $this->roomModel = $roomModel;
        $this->bookedRoomModel = $bookedRoomModel;
    }

    public function index()
    {
        return view('client.home');
    }

    public function searchRoom(SearchRoomRequest $request)
    {
        $listRoomIdBooked = [];
        if (!empty($request->check_in) && !empty($request->check_out)) {
            $startDate = date('Y-m-d', strtotime($request->check_in));
            $endDate = date('Y-m-d', strtotime($request->check_out));
            $listRoomIdBooked = $this->bookedRoomModel->getListRoomIdBooked($startDate, $endDate);
        }

        $listRoom = $this->roomModel->searchRoom($request, $listRoomIdBooked);

        return response()->json([
            'view' => view('client.rooms.room_list', ['listRoom' => $listRoom])->render()
        ]);
    }
}
