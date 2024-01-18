<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest.admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $check = Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($check) {
            return redirect()->route('admin.dashboard')->with(['alert-type' => 'success', 'message' => 'Login successfully!']);
        }

        return back()->with(['alert-type' => 'error', 'message' => 'Email or password is incorrect!']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.get.login');
    }
}
