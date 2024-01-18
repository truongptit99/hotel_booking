<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    public function getListUser()
    {
        return $this->userModel->getList();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userModel->findById($id);

        if (!empty($user)) {
            return view('admin.users.edit', ['user' => $user]);
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
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->only(['first_name', 'last_name']);

        $result = $this->userModel->updateUser($data, $id);

        if (!empty($result)) {
            return redirect()->route('users.index')->with(['alert-type' => 'success', 'message' => 'Update user successfully!']);
        }

        return back()->with(['alert-type' => 'error', 'message' => 'Update user failed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userModel->findById($id);

        if (!empty($user)) {
            if ($user->bookedRooms->count() > 0) {
                return response()->json([
                    'type' => 'warning',
                    'message' => 'This user has booked rooms and can not delete!'
                ]);
            }

            $user->delete();

            return response()->json([
                'type' => 'success',
                'message' => 'Delete user successfully!'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'message' => 'This user is not found!'
        ], 404);
    }
}
