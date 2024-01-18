<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\CreateRoomRequest;
use App\Http\Requests\Room\UpdateRoomRequest;
use App\Libraries\Utility;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $roomModel;

    public function __construct(Room $roomModel)
    {
        $this->roomModel = $roomModel;
    }

    public function index()
    {
        return view('admin.rooms.index');
    }

    public function getListRoom(Request $request)
    {
        return $this->roomModel->getList($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoomRequest $request)
    {
        $data = $request->only(['image', 'name', 'slug', 'type', 'price', 'max_adult', 'max_children', 'description']);
        if ($request->file('image')) {
            $fileName = Utility::uploadFile($request->file('image'), 'public/rooms');
            $data = array_merge($data, ['image' => $fileName]);
        }

        $result = $this->roomModel->createNewRoom($data);

        if (!empty($result)) {
            return response()->json([
                'type' => 'success',
                'message' => 'Create new room successfully!'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'message' => 'Create new room failed!'
        ], 500);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = $this->roomModel->findById($id);

        if (!empty($room)) {
            return view('admin.rooms.edit', ['room' => $room]);
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, $id)
    {
        $data = $request->only(['image', 'name', 'slug', 'type', 'price', 'max_adult', 'max_children', 'description']);
        $room = $this->roomModel->findById($id);
        $fileName = '';
        if (!empty($room)) {
            $fileName = $room->image;
        }

        if ($request->file('image')) {
            Utility::deleteFile($fileName, '/public/rooms/');
            $fileName = Utility::uploadFile($request->file('image'), 'public/rooms');
            $data = array_merge($data, ['image' => $fileName]);
        }

        $result = $this->roomModel->updateRoom($data, $id);

        if (!empty($result)) {
            return redirect()->route('rooms.index')->with(['alert-type' => 'success', 'message' => 'Update room successfully!']);
        }

        return back()->with(['alert-type' => 'error', 'message' => 'Update room failed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = $this->roomModel->findById($id);

        if (!empty($room)) {
            if ($room->bookedRooms->count() > 0) {
                return response()->json([
                    'type' => 'warning',
                    'message' => 'This room has been booked and can not delete!'
                ]);
            }

            Utility::deleteFile($room->image, '/public/rooms/');
            $room->delete();

            return response()->json([
                'type' => 'success',
                'message' => 'Delete room successfully!'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'message' => 'This room is not found!'
        ], 404);
    }
}
