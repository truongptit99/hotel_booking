<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'name', 'slug', 'type', 'price', 'max_adult', 'max_children', 'description'];

    public function bookedRooms()
    {
        return $this->hasMany(BookedRoom::class);
    }

    public function createNewRoom($attributes)
    {
        $result = $this->create($attributes);

        return $result;
    }

    public function getList($request)
    {
        $data = $this;
        if (!empty($request->room_type)) {
            $data = $data->where('type', $request->room_type);
        }
        $data = $data->orderBy('created_at', 'desc')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('image', function ($data) {
                return view('admin.elements.image', ['image' => $data->image]);
            })
            ->editColumn('type', function ($data) {
                return array_search($data->type, config('constants.room_type'));
            })
            ->editColumn('price', function ($data) {
                return number_format($data->price);
            })
            ->addColumn('action', function ($data) {
                return view('admin.elements.action', [
                    'url_edit' => route('rooms.edit', $data->id),
                    'url_destroy' => route('rooms.destroy', $data->id),
                ]);
            })
            ->make(true);
    }

    public function findById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function updateRoom($attributes, $id)
    {
        return $this->where('id', $id)->update($attributes);
    }

    public function searchRoom($request, $listRoomIdBooked)
    {
        $result = $this;

        if (!empty($request->name)) {
            $result = $result->where('name', 'like', '%' . $request->name . '%');
        }

        if (!empty($request->type)) {
            $result = $result->where('type', $request->type);
        }

        if (!empty($request->adult)) {
            $result = $result->where('max_adult', '>=', $request->adult);
        }

        if (!empty($request->children)) {
            $result = $result->where('max_children', '>=', $request->children);
        }

        $result = $result->whereNotIn('id', $listRoomIdBooked)
            ->orderBy('created_at', 'desc')
            ->paginate(config('constants.pagination'));

        return $result;
    }
}
