@extends('layouts.default')
@section('content')        
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Pharmacy Review</title>
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Standard Includes -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">
</head>

<body>
   
  <section>
     <div class="container-fluid">
         <form  role="form" method="POST" action="{{ url('/UpdatePharmacy/'. encrypt($MedicationRecord['id'])) }}">
                 {{ csrf_field() }}
        <div class="row">
            <div class="col-12 my-4">
                 <h3 class="text-center font-weight-bold mb-4">Jerry's Caring Hands Assisted Living</h3>
                 <div class="table-responsive">
                     <table cellpadding="0" cellspacing="0" class="table table-bordered medication2">
                        <tr>
                          <td>&nbsp;</td>
                          <td class="font-weight-bold text-center">AGENCY</td>
                          <td class="font-weight-bold text-center">MO</td>
                          <td class="font-weight-bold text-center">Year<br> 2006-2007</td>
                          <td colspan="31" valign="middle" class="text-center font-weight-bold">MEDICATION ADMINISTRATION RECORD</td>
                        </tr>
                        <tr>
                          <td class="text-center">START DATE</td>
                          <td class="text-center">Medication Dosage Prescription Numbers</td>
                          <td class="text-center">D/C DATE</td>
                          <td class="text-center">Hour</td>
                          <td class="bg-dark text-white text-center wd-60">1</td>
                          <td class="bg-dark text-white text-center wd-60">2</td>
                          <td class="bg-dark text-white text-center wd-60">3</td>
                          <td class="bg-dark text-white text-center wd-60">4</td>
                          <td class="bg-dark text-white text-center wd-60">5</td>
                          <td class="bg-dark text-white text-center wd-60">6</td>
                          <td class="bg-dark text-white text-center wd-60">7</td>
                          <td class="bg-dark text-white text-center wd-60">8</td>
                          <td class="bg-dark text-white text-center wd-60">9</td>
                          <td class="bg-dark text-white text-center wd-60">10</td>
                          <td class="bg-dark text-white text-center wd-60">11</td>
                          <td class="bg-dark text-white text-center wd-60">12</td>
                          <td class="bg-dark text-white text-center wd-60">13</td>
                          <td class="bg-dark text-white text-center wd-60">14</td>
                          <td class="bg-dark text-white text-center wd-60">15</td>
                          <td class="bg-dark text-white text-center wd-60">16</td>
                          <td class="bg-dark text-white text-center wd-60">17</td>
                          <td class="bg-dark text-white text-center wd-60">18</td>
                          <td class="bg-dark text-white text-center wd-60">19</td>
                          <td class="bg-dark text-white text-center wd-60">20</td>
                          <td class="bg-dark text-white text-center wd-60">21</td>
                          <td class="bg-dark text-white text-center wd-60">22</td>
                          <td class="bg-dark text-white text-center wd-60">23</td>
                          <td class="bg-dark text-white text-center wd-60">24</td>
                          <td class="bg-dark text-white text-center wd-60">25</td>
                          <td class="bg-dark text-white text-center wd-60">26</td>
                          <td class="bg-dark text-white text-center wd-60">27</td>
                          <td class="bg-dark text-white text-center wd-60">28</td>
                          <td class="bg-dark text-white text-center wd-60">29</td>
                          <td class="bg-dark text-white text-center wd-60">30</td>
                          <td class="bg-dark text-white text-center wd-60">31</td>
                        </tr>
                        <?php $i = 1;?>
                        @foreach($MedicationDosage as $md)

                       <?php
                      // echo "<pre>";
                     // print_r($items[0]) ;?> 
                       
                        <tr>
                          <input type="hidden" value="{{ $md['id'] }}" name="doses_id[{{ $i }}]">
                          <td rowspan="7"><input value="{{ $md['stat_date'] }}" name="startdate[{{ $i }}]"  value="" type="date" data-toggle="datepicker"  /></td>
                          <td rowspan="7"><input value="{{ $md['m_d_p_n'] }}" name="m_d_p_n[{{ $i }}]" type="text" /></td>
                          <td rowspan="7"><input value="{{ $md['dc_date'] }}" name="dc_date[{{ $i }}]" type="date" data-toggle="datepicker" /></td>
                          <td rowspan="7"><input value="{{ $md['hour'] }}" name="hour[{{ $i }}]" type="text" /></td>                          
                        </tr>  
                         <?php  for($j=1; $j<7; $j++){ ?>                    
                        <tr> 
                          <input type="hidden" value="{{ $items[$md['id']][$j-1]['id'] }}" name="ad_r_id[{{ $i }}][{{ $j }}]">
                          <?php for($k=1; $k<32; $k++){ ?>
                          <td><input value="{{ $items[$md['id']][$j-1]['c'.$k] }}" name="d[{{ $i }}][{{ $j }}][{{ $k }}]" type="text" /></td>
                        <?php } ?>
                        </tr> 
                      <?php   } $i++; ?>
                     
                      @endforeach
                       
                     </table>
                 </div>

                 <?php 
                        // print_r($MedicationRecord);
                        // exit;
                  ?>
                 <div class="col-12 mt-4 px-0">
                <label class="mb-1 font-weight-bold">DIAGNOSIS:</label>
                <input type="text" value="{{ $MedicationRecord->diagnosis }}" name="p_diagnosis" class="border-bottom-cls w-100" />
                 </div>
                 <div class="row">
                   <div class="col-md-6 col-12 mt-4">
                  <label class="mb-1 font-weight-bold">ALLERGIES:</label>
                  <input type="text" value="{{ $MedicationRecord->allergies }}" name="p_allergies" class="border-bottom-cls w-100" />
                   </div>
                   <div class="col-md-6 col-12 mt-4">
                  <label class="mb-1 font-weight-bold">DIET:</label>
                  <input type="text" value="{{ $MedicationRecord->diet }}" name="p_diet" class="border-bottom-cls w-100" />
                   </div>
                </div>

                  <div class="row">
                   <div class="col-md-6 col-12 mt-4">
                  <label class="mb-1 font-weight-bold">PHYSICIAN:</label>
                  <input type="text" value="{{ $MedicationRecord->physician }}" name="p_physician" class="border-bottom-cls w-100" />
                   </div>
                   <div class="col-md-6 col-12 mt-4">
                  <label class="mb-1 font-weight-bold">DELEGATING REGISTERED NURSE:</label>
                  <input type="text" value="{{ $MedicationRecord->reg_nurse }}" name="p_reg_nurse" class="border-bottom-cls w-100" />
                   </div>
                </div>

                <div class="row">
                   <div class="col-md-6 col-12 mt-4">
                  <label class="mb-1 font-weight-bold">NAME:</label>
                  <input type="text" value="{{ $MedicationRecord->name }}" name="p_name" class="border-bottom-cls w-100" />
                   </div>
                   <div class="col-md-6 col-12 mt-4">
                  <label class="mb-1 font-weight-bold">DATE:</label>
                  <input type="date" value="{{ $MedicationRecord->date }}" name="p_date" class="border-bottom-cls w-100" data-toggle="datepicker"  />
                   </div>
                </div>
            </div>
              <button type="submit" class="btn btn-info">Update</button>
        </div>
      </form>
     </div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   <!--  <script type="text/javascript">
        $(document).ready(function () {
            initDatepicker();
            $('#profile').validate({ // initialize the plugin
                rules: {
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    dob: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    address: {
                        required: true
                    },
                  
                }
            });
});
</script> -->

@endsection