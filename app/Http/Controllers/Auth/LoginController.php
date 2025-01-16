<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

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

    public function login(Request $request) {
        $input = $request->all();
        $this->validate($request, [
            'nik' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if(auth()->attempt(array('nik' => $input['nik'], 'email' => $input['email'], 'password' => $input['password'], 'is_verified' => 1))) {
            if(auth()->user()->is_admin==1) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('login');
            }
        } else {
            if (User::where('email', $input['email'])->get()->first()->is_verified == 0){
                return redirect()->route('login')->with('warning', 'Akunmu belum diverifikasi oleh admin.');    
            }
            return redirect()->route('login')->with('warning', 'Kredensial yang dimasukkan salah!');
        }
    }
}
