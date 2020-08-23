<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Auth;
use Helper;
use Hash;
use Session;
use Redirect;
use App\User;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Review';
        $breadCrum  = 'User';
        $reviewList = Review::select('user_id')->groupBy('user_id')->get();
        // dd($reviewList);
        return view('review.index')->with('pageTitle',$pageTitle)->with('breadCrum',$breadCrum)->with('reviewList',$reviewList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Review';
        $userRecords = User::orderBy('id','DESC')->get();
        // dd($userRecords);

        return view('review.profile')->with('pageTitle',$pageTitle)->with('userRecords',$userRecords);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $pageTitle = 'Review';
        $breadCrum  = '';
        $inputData = Request::all();
      $userRecords = User::orderBy('id','DESC')->get();
     $userDetails = Review::where('user_id', @$inputData['user_id'])->first();
     // dd($userDetails);
        if(empty($userDetails)){
        for ($i=1; $i <14 ; $i++) { 
            $ddata = new Review();
                $ddata->question = @$inputData['q'.$i];
                $ddata->response = @$inputData['r'.$i];
                $ddata->comment = @$inputData['c'.$i];
                $ddata->user_id = @$inputData['user_id'];
                $ddata->save();
        }
        $notification = array('message' => 'review saved Successful!', 'alert-type' => 'success' ); 
        return view('review')->with('pageTitle',$pageTitle)->with('userRecords',$userRecords)->with($notification);
    }else{
     $notification = array('message' => 'Review Already Exist,Please edit Review!', 'alert-type' => 'error' ); 
            return Redirect::to('review')->with($notification);
    }

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
    public function edit()
    {
       $pageTitle = 'Review';
        $breadCrum  = '';
        $inputData = Request::all();
        // dd($inputData);


        for ($i=1; $i <14 ; $i++) { 
            // $ddata = new Review();
                $ddata['question'] = @$inputData['q'.$i];
                $ddata['response'] = @$inputData['r'.$i];
                $ddata['comment'] = @$inputData['c'.$i];
                $ddata['user_id'] = @$inputData['user_id'];
                     review::where('id', @$inputData['r_id'.$i])->update($ddata);
        
    }
     $notification = array('message' => 'Record Updated Successful!', 'alert-type' => 'success' ); 
    return Redirect::to('review')->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($str)
    {
         $pageTitle = 'Review';
        $breadCrum  = '';
         $id = decrypt($str);
         $userRecords = User::orderBy('id','DESC')->get();

         $Review_data = Review::where('user_id', $id)->get()->toArray();
         // echo "<pre>";
         // print_r($Review_data[0]);
         // exit;

         // foreach ($MedicationDosage as $key => $value) {
         //    $items[$value->id] = AdministrationRecord::where('d_id', $value->id)->get()->toArray();
         // }
          return view('Review.update')->with('pageTitle',$pageTitle)->with('breadCrum',$breadCrum)->with('Review_data',$Review_data)->with('userRecords',$userRecords)->with('userid',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($str)
    {
         $id = decrypt($str);
        $res2=review::where('user_id', $id)->delete();
         $notification = array('message' => 'review deleted Successful!', 'alert-type' => 'success' ); 
          return Redirect::to('review')->with($notification);
    }
}
