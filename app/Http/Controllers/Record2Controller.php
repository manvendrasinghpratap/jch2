<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Auth;
use Helper;
use Hash;
use Session;
use Redirect;
use App\User;
use App\Record2_Table1;
use App\Record2_Table2;
use App\Record2_Table3;
use App\Record2_nurse;

class Record2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Record 2';
        $breadCrum  = 'User';
        $reviewList = Record2_nurse::orderBy('id','DESC')->get();
        // dd($reviewList);
        return view('record2.index')->with('pageTitle',$pageTitle)->with('breadCrum',$breadCrum)->with('reviewList',$reviewList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             $pageTitle = 'Record 2';
        // $userRecords = User::orderBy('id','DESC')->get();
        // dd($userRecords);

        return view('record2.profile')->with('pageTitle',$pageTitle);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pageTitle = 'Record 2';
        $breadCrum  = '';
        $inputData = Request::all();
        // dd($inputData);
    $data = new Record2_nurse();

    $data->n1 = @$inputData['ns1'];
    $data->n2 = @$inputData['ns2'];
    $data->n3 = @$inputData['ns3'];
    $data->save();
    $insertedId = $data->id;



       
        for ($i=1; $i <15 ; $i++) { 
            $ddata = new Record2_Table3();
                $ddata->date = @$inputData['date'][$i];
                $ddata->hour = @$inputData['hour'][$i];
                $ddata->initial = @$inputData['initial'][$i];
                $ddata->medication = @$inputData['medication'][$i];
                $ddata->reason = @$inputData['reason'][$i];
                $ddata->action = @$inputData['action'][$i];
                $ddata->n_id = @$insertedId;
                $ddata->save();
        }
         for ($i=1; $i <6 ; $i++) { 
            $ddata1 = new Record2_Table2();
                $ddata1->date = @$inputData['date1'][$i];
                $ddata1->hour = @$inputData['hour1'][$i];
                $ddata1->initial = @$inputData['initial1'][$i];
                $ddata1->medication = @$inputData['medication1'][$i];
                $ddata1->reason = @$inputData['actionm1'][$i];
                $ddata1->action = @$inputData['actionm2'][$i];
                $ddata1->n_id = @$insertedId;
                $ddata1->save();
        }
         for ($i=1; $i <15 ; $i++) { 
            $ddata2 = new Record2_Table1();
                $ddata2->date = @$inputData['date2'][$i];
                $ddata2->hour = @$inputData['hour2'][$i];
                $ddata2->initial = @$inputData['initial2'][$i];
                $ddata2->medication = @$inputData['medication2'][$i];
                $ddata2->reason = @$inputData['reason2'][$i];
                $ddata2->action = @$inputData['result2'][$i];
                $ddata2->n_id = @$insertedId;
                $ddata2->save();
        }
         $notification = array('message' => 'Record created Successful!', 'alert-type' => 'success' ); 
        return Redirect::to('record')->with($notification);

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
        $pageTitle = 'Record 2';
        $breadCrum  = '';
        $inputData = Request::all();
        // dd($inputData);

        // $data = new Record2_nurse();

    $data['n1'] = @$inputData['ns1'];
    $data['n2'] = @$inputData['ns2'];
    $data['n3'] = @$inputData['ns3'];
    Record2_nurse::where('id', @$inputData['n_id'])->update($data);
    



       
        for ($i=1; $i <15 ; $i++) { 
            // $ddata = new Record2_Table3();
                $ddata['date'] = @$inputData['date'][$i];
                $ddata['hour'] = @$inputData['hour'][$i];
                $ddata['initial'] = @$inputData['initial'][$i];
                $ddata['medication'] = @$inputData['medication'][$i];
                $ddata['reason'] = @$inputData['reason'][$i];
                $ddata['action'] = @$inputData['action'][$i];
                // $ddata->n_id = @$insertedId;
                Record2_Table3::where('id', @$inputData['id'][$i])->update($ddata);
                // $ddata->save();
        }
         for ($i=1; $i <6 ; $i++) { 
            // $ddata1 = new Record2_Table2();
            $ddata1['date'] = @$inputData['date1'][$i];
                $ddata1['hour'] = @$inputData['hour1'][$i];
                $ddata1['initial'] = @$inputData['initial1'][$i];
                $ddata1['medication'] = @$inputData['medication1'][$i];
                $ddata1['reason'] = @$inputData['actionm1'][$i];
                $ddata1['action'] = @$inputData['actionm1'][$i];
                // $ddata->n_id = @$insertedId;
                Record2_Table2::where('id', @$inputData['id1'][$i])->update($ddata1);
                // $ddata1->date = @$inputData['date1'][$i];
                // $ddata1->hour = @$inputData['hour1'][$i];
                // $ddata1->initial = @$inputData['initial1'][$i];
                // $ddata1->medication = @$inputData['medication1'][$i];
                // $ddata1->reason = @$inputData['actionm1'][$i];
                // $ddata1->action = @$inputData['actionm2'][$i];
                // $ddata1->n_id = @$insertedId;
                // $ddata1->save();
        }
         for ($i=1; $i <15 ; $i++) { 
            // $ddata2 = new Record2_Table1();
             $ddata2['date'] = @$inputData['date2'][$i];
                $ddata2['hour'] = @$inputData['hour2'][$i];
                $ddata2['initial'] = @$inputData['initial2'][$i];
                $ddata2['medication'] = @$inputData['medication2'][$i];
                $ddata2['reason'] = @$inputData['reason2'][$i];
                $ddata2['action'] = @$inputData['result2'][$i];
                // $ddata->n_id = @$insertedId;
                Record2_Table1::where('id', @$inputData['id2'][$i])->update($ddata2);
                // $ddata2->date = @$inputData['date2'][$i];
                // $ddata2->hour = @$inputData['hour2'][$i];
                // $ddata2->initial = @$inputData['initial2'][$i];
                // $ddata2->medication = @$inputData['medication2'][$i];
                // $ddata2->reason = @$inputData['reason2'][$i];
                // $ddata2->action = @$inputData['result2'][$i];
                // $ddata2->n_id = @$insertedId;
                // $ddata2->save();
        }
         $notification = array('message' => 'Record Updated Successful!', 'alert-type' => 'success' ); 
        return Redirect::to('record')->with($notification);

        // dd($inputData);


    //     for ($i=1; $i <14 ; $i++) { 
    //         // $ddata = new Review();
    //             $ddata['question'] = @$inputData['q'.$i];
    //             $ddata['response'] = @$inputData['r'.$i];
    //             $ddata['comment'] = @$inputData['c'.$i];
    //             $ddata['user_id'] = @$inputData['user_id'];
    //                  review::where('id', @$inputData['r_id'.$i])->update($ddata);
        
    // }
    // return Redirect::to('record');
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $str)
    {
            $pageTitle = 'Record 2';
            $breadCrum  = '';
            $id = decrypt($str);
            $res1=Record2_nurse::where('id', $id)->get()->toArray();
            // dd($res1);
            $res2=Record2_Table1::where('n_id', $id)->get();
            $res3=Record2_Table2::where('n_id', $id)->get();
            $res4=Record2_Table3::where('n_id', $id)->get();

          return view('record2.update')->with('pageTitle',$pageTitle)->with('breadCrum',$breadCrum)->with('res1',$res1)->with('res2',$res2)->with('res3',$res3)->with('res4',$res4);
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
        $res1=Record2_nurse::where('id', $id)->delete();
        $res2=Record2_Table1::where('n_id', $id)->delete();
        $res3=Record2_Table2::where('n_id', $id)->delete();
        $res4=Record2_Table3::where('n_id', $id)->delete();
        $notification = array('message' => 'Record Deleted Successful!', 'alert-type' => 'success' ); 
        return Redirect::to('record')->with($notification);
    }
}
