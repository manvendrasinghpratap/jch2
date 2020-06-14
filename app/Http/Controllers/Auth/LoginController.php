<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/dashboard';
	
	/* Username Customization*/
	public function username()
	{
		return 'email';
	}
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 protected function credentials(Request $request)
	{
		return array_merge($request->only($this->username(), 'password'), ['status' => 1]);
    
	}
	 protected function authenticated(Request $request, $user)
    {
      $notification = array(
        'message' => 'Successful login!', 
        'alert-type' => 'success'
      );
      $picName = Auth::user()->userDetails->image_name;
      Session::put('picName', $picName);
		return Redirect::to('/dashboard')->with($notification);
    }
	
  public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}
}
