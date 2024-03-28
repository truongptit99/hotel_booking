<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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
    protected $userModel;

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
    public function __construct(User $userModel)
    {
        $this->middleware('guest.web')->except('logout');
        $this->userModel = $userModel;
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

    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();

            $userExist = $this->userModel->findByEmail($user->email);

            if (!empty($userExist)) {
                if (empty($userExist->google_id)) {
                    return redirect()->route('login')->with(['alert-type' => 'warning', 'message' => 'This email was registered with another account!']);
                }

                $this->userModel->updateUser(['google_id' => $user->id], $userExist->id);
            } else {
                $userExist = $this->userModel->createNewUser([
                    'first_name' => $user->user['given_name'],
                    'last_name' => $user->user['family_name'],
                    'email' => $user->email,
                    'email_verified_at' => now(),
                    'password' => Hash::make(12345678),
                    'google_id' => $user->id
                ]);
            }

            Auth::loginUsingId($userExist->id);

            return redirect()->route('home.index')->with(['alert-type' => 'success', 'message' => 'Login via google successfully!']);
            
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
