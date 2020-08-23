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
        
           <form  role="form" method="POST" action="{{ url('/addrecord') }}">
            <div class="row">
                 {{ csrf_field() }}
            <div class="col-12 my-4">
                 <h3 class="text-center font-weight-bold mb-4">Jerry's Caring Hands Assisted Living</h3>
                 <div class="table-responsive">
                     <table cellpadding="0" cellspacing="0" class="table table-bordered medication1 table-responsive">
                        <tr>
                          <td colspan="6" class="font-weight-bold text-center">PRN/STAT ORDERS</td>
                          <td class="font-weight-bold text-center">INITIAL STAFF NAME JOB TITLE</td>
                        </tr>

                        <tr>
                          <td class="text-center">DATE</td>
                          <td class="text-center">HOUR</td>
                          <td class="text-center">Initial</td>
                          <td class="text-center">MEDICATION</td>
                          <td class="text-center">REASON</td>
                          <td class="text-center">RESULT</td>
                          <td>1</td> 
                        </tr>

                        <?php for($i= 1; $i < 15; $i++){ ?>
                        <tr>
                          <td class="text-center"><input name="date2[{{ $i }}]" type="date" /></td>
                          <td class="text-center"><input name="hour2[{{ $i }}]" type="text" /></td>
                          <td class="text-center"><input name="initial2[{{ $i }}]" type="text" /></td>
                          <td class="text-center"><input name="medication2[{{ $i }}]" type="text" /></td>
                          <td class="text-center"><input name="reason2[{{ $i }}]" type="text" /></td>
                          <td class="text-center"><input name="result2[{{ $i }}]" type="text" /></td>
                          <!-- <td rowspan="2">2</td> -->
                        </tr>
                      <?php } ?>
                       <!--  <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>

                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td rowspan="2">3</td>
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>

                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td rowspan="2">4</td>
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>


                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td rowspan="2">5</td>
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>

                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td rowspan="2">6</td>
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>


                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td rowspan="2">7</td>
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>


                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td rowspan="2">8</td>
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr> -->
                      </table>
                      <table cellpadding="0" cellspacing="0" class="table table-bordered medication1 table-responsive">

                        <tr>
                          <td colspan="6" class="font-weight-bold text-center">MEDICATION RECORDS</td>
                          <td>9</td>
                        </tr>

                        <tr>
                          <td class="text-center">DATE</td>
                          <td class="text-center">HOUR</td>
                          <td class="text-center">Initial</td>
                          <td class="text-center">MEDICATION</td>
                          <td class="text-center" colspan="2">ACTION TAKEN</td>
                         <!--  <td rowspan="2">10</td> -->
                        </tr>
                         <?php for($j= 1; $j < 6; $j++){ ?>
                        <tr>
                          <td class="text-center"><input name="date1[{{ $j }}]" type="date" /></td>
                          <td class="text-center"><input name="hour1[{{ $j }}]" type="text" /></td>
                          <td class="text-center"><input name="initial1[{{ $j }}]" type="text" /></td>
                          <td class="text-center"><input name="medication1[{{ $j }}]" type="text" /></td>
                          <td class="text-center"><input name="actionm1[{{ $j }}]" type="text" /></td>
                          <td class="text-center"><input name="actionm2[{{ $j }}]" type="text" /></td>
                        </tr>
                      <?php } ?>

                       <!--  <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td rowspan="2">11</td>
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>

                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td rowspan="2">12</td>
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr> -->
                        </table>
                        <table class="table-responsive">
                          <tr>
                            <td>
                      <table cellpadding="0" cellspacing="0" style="float: left" class="table table-bordered medication1 table-responsive">

                        <tr>
                          <td colspan="6" class="font-weight-bold text-center"> MEDICATION OMISSION-MEDICATION CHANGES</td>
                         <!--  <td>13</td> -->
                        </tr>

                        <tr>
                          <td class="text-center">DATE</td>
                          <td class="text-center">HOUR</td>
                          <td class="text-center">Initial</td>
                          <td class="text-center">MEDICATION</td>
                          <td class="text-center">REASON</td>
                          <td class="text-center">ACTION TAKEN</td>
                         <!--  <td>14</td> -->
                        </tr>
                         <?php for($k= 1; $k < 15; $k++){ ?>
                        <tr>
                          <td class="text-center"><input name="date[{{ $k }}]" type="date" /></td>
                          <td class="text-center"><input name="hour[{{ $k }}]" type="text" /></td>
                          <td class="text-center"><input name="initial[{{ $k }}]" type="text" /></td>
                          <td class="text-center"><input name="medication[{{ $k }}]" type="text" /></td>
                          <td class="text-center"><input name="reason[{{ $k }}]" type="text" /></td>
                          <td class="text-center"><input name="action[{{ $k }}]" type="text" /></td>
                          <!-- <td rowspan="2">15</td> -->
                        </tr>
                      <?php } ?>
                 <!--        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>


                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                         
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>

                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                       
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>

                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                       
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr>


                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                         
                        </tr>
                        <tr>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                          <td class="text-center"><input type="text" /></td>
                        </tr> -->

                     </table >
                     </td>
                       <td>
                        
                            <table cellpadding="0" cellspacing="0" class="table table-bordered medication1">
                              <tr>
                                <td class="text-center wd-50 border-left-0 border-bottom-0"> INITIAL NURSE SURVEY</td>
                                <td class="text-center wd-50 border-right-0 border-bottom-0">DATE REV</td>
                              </tr>
                              <tr>
                                <td class="text-center wd-50 border-left-0 border-bottom-0 border-top-0">1</td>
                                <td class="text-center wd-50 border-right-0 border-bottom-0 border-top-0"><input name="ns1" type="text" /></td>
                              </tr>
                              <tr>
                                <td class="text-center wd-50 border-left-0 border-bottom-0 border-top-0">2</td>
                                <td class="text-center wd-50 border-right-0 border-bottom-0 border-top-0"><input name="ns2" type="text" /></td>
                              </tr>
                              <tr>
                                <td class="text-center wd-50 border-left-0 border-bottom-0 border-top-0">3</td>
                                <td class="text-center wd-50 border-right-0 border-bottom-0 border-top-0"><input name="ns3" type="text" /></td>
                              </tr>
                              
                            </table>
                        
                      </td>
                      </tr>
                     </table>

                 </div>
                  
            </div>
            <button type="submit" class="btn btn-info">Add</button>
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