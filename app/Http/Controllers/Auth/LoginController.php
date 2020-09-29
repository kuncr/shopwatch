<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request) {
      Auth::logout();
      return redirect()->route('shop');
    }
    public function login(Request $request){
        $data = $request->only('email','password');
        if(\Auth::attempt($data)){
            if(Auth::user()->role_id==1)
            {
                return redirect()->route('list-product');
            }else{
                return redirect()->route('shop');
            }
        }
        return redirect()->back()->with(['fail'=>'Email hoặc mật khẩu sai']);
    }
}
