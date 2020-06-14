<?php

namespace App\Http\Controllers;

use Auth;
use Helper;
use Hash;
use Session;
use Redirect;
use App\UserDetail;
use App\Http\Requests\StoreProfileRecord;
use App\Http\Requests\ChangepasswordRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageTitle = 'Users Listing';
        $breadCrum  = 'User';
        return view('user.index')->with('pageTitle',$pageTitle)->with('breadCrum',$breadCrum);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProfileRecord $request)
    {
        $id = Helper::decrypt($request->user_detail_id);
        $userDetails = UserDetail::find($id);

        if($request->hasFile('profile_image')) {
            $files = $request->file('profile_image');
            $publicPath = public_path('upload\images');
            $imageName = time().'.'.request()->profile_image->getClientOriginalExtension();
            $realFileName = request()->profile_image->getClientOriginalName();
            request()->profile_image->move($publicPath, $imageName);
            $picName = Auth::user()->userDetails->image_name;
            Session::put('picName', $imageName); 
        }       

        if(!empty($userDetails)){
            $userDetails->first_name        = $request->get('first_name'); 
            $userDetails->last_name         = $request->get('last_name'); 
            $userDetails->gender            = $request->get('gender'); 
            $userDetails->dob               = date(config('app.date_store_format'), strtotime($request->get('dob')));        
            $userDetails->phone             = $request->get('phone'); 
            $userDetails->address           = $request->get('address'); 
            if($request->hasFile('profile_image')) {
                $userDetails->image_path        = $publicPath; 
                $userDetails->image_name        = $imageName; 
                $userDetails->origin_name       = $realFileName;  
            }
            $userDetails->save();
            $notification = array('message' => 'Profile Updated Successful!', 'alert-type' => 'success' );	
            return Redirect::to('profile')->with($notification);
        }else{
            $notification = array('message' => 'Woops Something is Wrong!', 'alert-type' => 'error' );	
            return Redirect::to('profile')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	public function profile(Request $request){
        $pageTitle = 'My Profile';
        $breadCrum  = '';
		$userDetails = UserDetail::where('user_id',Auth::user()->id)->first();
		if(empty($userDetails)){
			$userDetail = new UserDetail;
			$userDetail->user_id = Auth::user()->id; 
			$userDetail->first_name = Auth::user()->name; 
			$userDetail->save();
			$userDetails = UserDetail::where('user_id',Auth::user()->id)->first();	
		}	
		$notification = array(
		'message' => 'Successful login!', 
		'alert-type' => 'success'
		);	
	    return view('user.profile')->with('userDetails',$userDetails)->with('pageTitle',$pageTitle)->with('breadCrum',$breadCrum);		
    }
    
    public function showChangePasswordForm(Request $request){
        $pageTitle = 'Change Password';
        $breadCrum  = '';
        return view('user.changepassword')->with('pageTitle',$pageTitle)->with('breadCrum',$breadCrum);
    }

    public function postChangePassword(ChangepasswordRequest $request){
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            $notification = array('message' => 'Your current password does not matches with the password you provided. Please try again!', 'alert-type' => 'error');
            return redirect()->back()->with($notification)->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        
        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            $notification = array('message' => 'New Password cannot be same as your current password. Please choose a different password!', 'alert-type' => 'error');
            return redirect()->back()->with($notification)->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }        
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        $pageTitle = 'Change Password';
        $breadCrum  = '';
        $notification = array('message' => 'Successful Password Changed!', 'alert-type' => 'success');
        return redirect()->back()->with('pageTitle',$pageTitle)->with('breadCrum',$breadCrum)->with($notification);
    }  

}
