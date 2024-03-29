<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest.web')->except('logout');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $remember = $request->boolean('remember');

        if (Auth::guard('web')->attempt($credentials, $remember)) {
            return redirect()->route('home.index')->with(['alert-type' => 'success', 'message' => 'Login successfully!']);
        }

        return back()->with(['alert-type' => 'error', 'message' => 'Email or password is incorrect!']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('home.index');
    }
}
