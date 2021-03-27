<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;
use Redirect;
use Illuminate\Http\Request;

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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if($user){
            if($user->is_active == 'Y'){
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    // Authentication passed...
                    if(Auth::user()->role->nama_role == 'Admin' or Auth::user()->role->nama_role == 'Super Admin'){
                        return redirect()->intended('/home');
                    }else{
                        return redirect()->intended('/pengguna/dashboard');
                    }
                }else{
                    return Redirect::to("login")->withErrors('Maaf password salah');
                }
            }else{
                return Redirect::to("login")->withErrors('Maaf akun anda belum di verifikasi');
            }

        }else{
            return Redirect::to("login")->withErrors('Maaf email belum terdaftar');
        }

    }
}
