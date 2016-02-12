<?php

namespace TruckJee\Http\Controllers\Login;

use Illuminate\Support\Facades\Log;
use TruckJee\User;
use Illuminate\Http\Request;

use TruckJee\Http\Requests;
use TruckJee\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * LoginController constructor.
     */
    public function __construct()
   {
      $this->middleware('guest', ['except' => 'getLogout']);
   }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
   {
      return view('auth.login')->with(['error'=>'']);
   }

    /**
     * Status code
     * 301 - email id not in database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
   {
      Log::info("User tried to log in ".$request->input('email'));
      $email = $request->input('email');
      $password = $request->input('password');
      $user = User::where('email','=',$email)->first();
      if($user == null)
         return(view('auth.login')->with(['error'=>'Unable to Login. Status code 301']));

      if(Auth::attempt([
          'email'   =>  $email,
          'password'=>  $password
      ]))
      {
          Log::info("User logged login ".$request->input('email'));

          return response()->redirectTo($this->getUrl($user->role));
      }
       Log::info("User login failed ".$request->input('email'));
       return view('auth.login') ->with(['error'=>'Wrong password. Try again!']);
   }

    /**
     *Log out the user
     */
    public function getLogout()
   {
        Auth::logout();
       return view('auth.logout')->with(['message'=>'Successfully logged out']);
   }

    /**
     * return to truck owner if role is 1
     * return to transporter if role is 2
     * return to admin if role is 0
     * @param $role
     * @return string
     */
    public function getUrl($role)
    {
        switch ($role):
            case 0:
                return'/admin/';
                break;
            case 1:
                return '/truck-owner/';
                break;
            case 2:
                return '/transporter/';
                break;
        endswitch;
    }


}
