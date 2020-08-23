<?php

namespace App\Http\Controllers;


use Auth;
use Helper;
use Hash;
use Session;
use Redirect;
use App\UserDetail;
use App\MedicationRecord;
use App\MedicationDosage;
use App\AdministrationRecord;
use App\Patient;
use App\Http\Requests\StoreProfileRecord;
use App\Http\Requests\ChangepasswordRequest;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
        $pageTitle = 'Record 1';
        $breadCrum  = 'User';
        $patientList = MedicationRecord::orderBy('id','DESC')->get();
        return view('pharmacy.index')->with('pageTitle',$pageTitle)->with('breadCrum',$breadCrum)->with('patientList',$patientList);
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
    public function edit($str)
    {
         $pageTitle = 'Record 1';
        $breadCrum  = '';
        $inputData = Request::all();

          $id = decrypt($str);
          // print_r($inputData);
          // exit;
      
            $data = MedicationRecord::find($id);

                // $data = new MedicationRecord();
              if(!empty($data)){

                $data->diagnosis = @$inputData['p_diagnosis'];
                $data->allergies = @$inputData['p_allergies'];
                $data->physician = @$inputData['p_physician'];
                $data->name = @$inputData['p_name'];
                $data->diet = @$inputData['p_diet'];
                $data->reg_nurse = @$inputData['p_reg_nurse'];
                $data->date = @$inputData['p_date'];

                $data->save();
                $insertedId = $data->id;



                 $pdata = Patient::find($id);
                if(!empty($data)){
                $pdata->p_id = @$insertedId;
                $pdata->save();
                $insertedpId = $pdata->id;

              
                // $res=MedicationDosage::where('p_id',$insertedpId)->delete();

                //    print_r($res);
                // exit;

                for ($i=1; $i < 7; $i++) { 
                    // $pdata = MedicationDosage::find($id);
                 // $ddata = new MedicationDosage();
                 // $ddata = $ddata->find();
                $ddata['stat_date'] = @$inputData['startdate'][$i];
                $ddata['m_d_p_n'] = @$inputData['m_d_p_n'][$i];
                $ddata['dc_date'] = @$inputData['dc_date'][$i];
                $ddata['hour'] = @$inputData['hour'][$i];
                $ddata['p_id'] = @$insertedpId;
                MedicationDosage::where('id', @$inputData['doses_id'][$i])->update($ddata);
                 $inserteddId = @$inputData['doses_id'][$i];

                // $res=AdministrationRecord::where('d_id',$inserteddId)->delete();

                for ($j=1; $j < 7; $j++) { 

                        
                        
                        // dd($adata, @$inputData['ad_r_id'][$i][$j]);
                 $adata['d_id'] = @$inserteddId;        
                $adata['c1'] = @$inputData['d'][$i][$j][1];
                $adata['c2'] = @$inputData['d'][$i][$j][2];
                $adata['c3'] = @$inputData['d'][$i][$j][3];
                $adata['c4'] = @$inputData['d'][$i][$j][4];
                $adata['c5'] = @$inputData['d'][$i][$j][5];
                $adata['c6'] = @$inputData['d'][$i][$j][6];
                $adata['c7'] = @$inputData['d'][$i][$j][7];
                $adata['c8'] = @$inputData['d'][$i][$j][8];
                $adata['c9'] = @$inputData['d'][$i][$j][9];
                $adata['c10'] = @$inputData['d'][$i][$j][10];
                $adata['c11'] = @$inputData['d'][$i][$j][11];
                $adata['c12'] = @$inputData['d'][$i][$j][12];
                $adata['c13'] = @$inputData['d'][$i][$j][13];
                $adata['c14'] = @$inputData['d'][$i][$j][14];
                $adata['c15'] = @$inputData['d'][$i][$j][15];
                $adata['c16'] = @$inputData['d'][$i][$j][16];
                $adata['c17'] = @$inputData['d'][$i][$j][17];
                $adata['c18'] = @$inputData['d'][$i][$j][18];
                $adata['c19'] = @$inputData['d'][$i][$j][19];
                $adata['c20'] = @$inputData['d'][$i][$j][20];
                $adata['c21'] = @$inputData['d'][$i][$j][21];
                $adata['c22'] = @$inputData['d'][$i][$j][22];
                $adata['c23'] = @$inputData['d'][$i][$j][23];
                $adata['c24'] = @$inputData['d'][$i][$j][24];
                $adata['c25'] = @$inputData['d'][$i][$j][25];
                $adata['c26'] = @$inputData['d'][$i][$j][26];
                $adata['c27'] =  @$inputData['d'][$i][$j][27];
                $adata['c28'] =  @$inputData['d'][$i][$j][28];
                $adata['c29'] =  @$inputData['d'][$i][$j][29];
                $adata['c30'] =  @$inputData['d'][$i][$j][30];
                $adata['c31'] =  @$inputData['d'][$i][$j][31];
               
                AdministrationRecord::where('id', @$inputData['ad_r_id'][$i][$j])->update($adata);
              
                   }
                }

                }

                 }


                  $notification = array('message' => 'Record Updated Successful!', 'alert-type' => 'success' ); 
         return Redirect::to('pharmacy')->with($notification);
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
        $pageTitle = 'Record 1';
        $breadCrum  = '';
         $id = decrypt($str);
         $items = array();
         $MedicationRecord = MedicationRecord::where('id', $id)->first();

         $MedicationDosage = MedicationDosage::where('p_id', $MedicationRecord->id)->get();

         foreach ($MedicationDosage as $key => $value) {
            $items[$value->id] = AdministrationRecord::where('d_id', $value->id)->get()->toArray();
         }



        
        // dd($items);
     

          // $tahsilList = Tahsil::orderBy('id','DESC')->get();
        return view('pharmacy.update')->with('pageTitle',$pageTitle)->with('breadCrum',$breadCrum)->with('MedicationRecord',$MedicationRecord)->with('MedicationDosage',$MedicationDosage)->with('items',$items);  
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
        $MedicationRecord = MedicationRecord::where('id', $id)->first();

            $pdata = Patient::where('p_id', $MedicationRecord->id)->first();

            $MedicationDosage = MedicationDosage::where('p_id', $pdata->id)->get();

              foreach ($MedicationDosage as $key => $value) {
            // AdministrationRecord::where('d_id', $value->id)->get()->toArray();
            $res=AdministrationRecord::where('d_id', $value->id)->delete();
         }

         $res1=MedicationDosage::where('p_id', $pdata->id)->delete();
         $res2=Patient::where('p_id', $MedicationRecord->id)->delete();
         $res2=MedicationRecord::where('id', $id)->delete();
         $notification = array('message' => 'Record Deleted Successful!', 'alert-type' => 'success' ); 
          return Redirect::to('pharmacy')->with($notification);
    }

    
    
        public function profile(Request $request){
        $pageTitle = 'Record 1';
        // $breadCrum  = '';
        // $inputData = Request::all();
        // dd($request);
        // $userDetails = UserDetail::where('user_id',Auth::user()->id)->first();
        // if(empty($userDetails)){
        //     $userDetail = new UserDetail;
        //     $userDetail->user_id = Auth::user()->id; 
        //     $userDetail->first_name = Auth::user()->name; 
        //     $userDetail->save();
        //     $userDetails = UserDetail::where('user_id',Auth::user()->id)->first();  
        // }   
        // $notification = array(
        // 'message' => 'Successful login!', 
        // 'alert-type' => 'success'
        // );  
        return view('pharmacy.profile')->with('pageTitle',$pageTitle);      
    }

    public function addpharmacy(Request $request){
        $pageTitle = 'Record 1';
        $breadCrum  = '';
        $inputData = Request::all();
      
            

                $data = new MedicationRecord();

                $data->diagnosis = @$inputData['p_diagnosis'];
                $data->allergies = @$inputData['p_allergies'];
                $data->physician = @$inputData['p_physician'];
                $data->name = @$inputData['p_name'];
                $data->diet = @$inputData['p_diet'];
                $data->reg_nurse = @$inputData['p_reg_nurse'];
                $data->date = @$inputData['p_date'];

                $data->save();
                $insertedId = $data->id;


                $pdata = new Patient();
                $pdata->p_id = @$insertedId;
                $pdata->save();
                $insertedpId = $pdata->id;

                for ($i=1; $i < 7; $i++) { 
                $ddata = new MedicationDosage();
                $ddata->stat_date = @$inputData['startdate'][$i];
                $ddata->m_d_p_n = @$inputData['m_d_p_n'][$i];
                $ddata->dc_date = @$inputData['dc_date'][$i];
                $ddata->hour = @$inputData['hour'][$i];
                $ddata->p_id = @$insertedpId;
                $ddata->save();
                $inserteddId = $ddata->id;

                for ($j=1; $j < 7; $j++) { 

                        $adata = new AdministrationRecord();
                $adata->c1 = @$inputData['d'][1][$i][$j];
                $adata->c2 = @$inputData['d'][2][$i][$j];
                $adata->c3 = @$inputData['d'][3][$i][$j];
                $adata->c4 = @$inputData['d'][4][$i][$j];
                $adata->c5 = @$inputData['d'][5][$i][$j];
                $adata->c6 = @$inputData['d'][6][$i][$j];
                $adata->c7 = @$inputData['d'][7][$i][$j];
                $adata->c8 = @$inputData['d'][8][$i][$j];
                $adata->c9 = @$inputData['d'][9][$i][$j];
                $adata->c10 = @$inputData['d'][10][$i][$j];
                $adata->c11 = @$inputData['d'][11][$i][$j];
                $adata->c12 = @$inputData['d'][12][$i][$j];
                $adata->c13 = @$inputData['d'][13][$i][$j];
                $adata->c14 = @$inputData['d'][14][$i][$j];
                $adata->c15 = @$inputData['d'][15][$i][$j];
                $adata->c16 = @$inputData['d'][16][$i][$j];
                $adata->c17 = @$inputData['d'][17][$i][$j];
                $adata->c18 = @$inputData['d'][18][$i][$j];
                $adata->c19 = @$inputData['d'][19][$i][$j];
                $adata->c20 = @$inputData['d'][20][$i][$j];
                $adata->c21 = @$inputData['d'][21][$i][$j];
                $adata->c22 = @$inputData['d'][22][$i][$j];
                $adata->c23 = @$inputData['d'][23][$i][$j];
                $adata->c24 = @$inputData['d'][24][$i][$j];
                $adata->c25 = @$inputData['d'][25][$i][$j];
                $adata->c26 = @$inputData['d'][26][$i][$j];
                $adata->c27 =  @$inputData['d'][27][$i][$j];
                $adata->c28 =  @$inputData['d'][28][$i][$j];
                $adata->c29 =  @$inputData['d'][29][$i][$j];
                $adata->c30 =  @$inputData['d'][30][$i][$j];
                $adata->c31 =  @$inputData['d'][31][$i][$j];
                $adata->d_id = @$inserteddId;
                $adata->save();
              
                   
                }

                }

       //              echo "<pre>";
       // print_r($insertedId);
       // exit();
            
        // $userDetails = UserDetail::where('user_id',Auth::user()->id)->first();
        // if(empty($userDetails)){
        //     $userDetail = new UserDetail;
        //     $userDetail->user_id = Auth::user()->id; 
        //     $userDetail->first_name = Auth::user()->name; 
        //     $userDetail->save();
        //     $userDetails = UserDetail::where('user_id',Auth::user()->id)->first();  
        // }   
        $notification = array('message' => 'Record created Successful!', 'alert-type' => 'success' );  
        // return view('pharmacy.profile')->with('pageTitle',$pageTitle)->with('breadCrum',$breadCrum);   
         return Redirect::to('pharmacy')->with($notification);    
    }
}
