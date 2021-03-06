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
     <div class="container">
      <form  role="form" method="POST" action="{{ url('/UpdateReview') }}">
                 {{ csrf_field() }}
        <div class="row">
          <div class="col-md-10 mx-auto col-12 pharmacy-review my-5">
             <div class="form-group{{ $errors->has('dist_id') ? ' has-error' : '' }} row">
                    <label for="dist_id" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-10">
                                <select disabled=""  class="form-control" name="user_id" >
                                  <?php 
                                     if(!empty($userRecords)):
                                        $i=1;
                                        foreach($userRecords as $key => $val):
                                        ?>
                                  <option {{ ($val->id == $userid) ? "selected" : "" }} value="{{ $val->id }}" >{{ $val->name }} </option>
                                        <?php
                                    endforeach;
                                    endif; 
                                ?>
                                </select>
                    </div>
                  </div>
               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Are medication packaged appropriately?
                </div>
                <input type="hidden" name="q1">
                 <input type="hidden" value="{{ $Review_data[0]['id'] }}" name="r_id1">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r1" value="1" class="custom-control-input" {{ $Review_data[0]['response'] == 1 ? 'checked' : ''}}  id="question1Yes" />
              <label class="custom-control-label" for="question1Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r1" value="0" class="custom-control-input" id="question1No" {{ $Review_data[0]['response'] == '0' ? 'checked' : ''}} />
              <label class="custom-control-label" for="question1No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea name="c1" class="form-control">{{ $Review_data[0]['comment'] }}</textarea>
                </div>
               </div>
               
               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Are medications stored and maintained properly?
                </div>
                <input type="hidden" name="q2">
                    <input type="hidden" value="{{ $Review_data[1]['id'] }}" name="r_id2">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r2" value="1" class="custom-control-input" {{ $Review_data[1]['response'] == 1 ? 'checked' : ''}} id="question2Yes" />
              <label class="custom-control-label" for="question2Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r2" value="0" class="custom-control-input" {{ $Review_data[1]['response'] == '0' ? 'checked' : ''}}  id="question2No" />
              <label class="custom-control-label" for="question2No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea name="c2" class="form-control">{{ $Review_data[1]['comment'] }}</textarea>
                </div>
               </div>

               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Is resident receiving medications as ordered and prescribed?
                </div>
                <input type="hidden" name="q3">
               <input type="hidden" value="{{ $Review_data[2]['id'] }}" name="r_id3">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r3" value="1" class="custom-control-input" {{ $Review_data[2]['response'] == 1 ? 'checked' : ''}} id="question3Yes" />
              <label class="custom-control-label" for="question3Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r3" value="0" class="custom-control-input" {{ $Review_data[2]['response'] == '0' ? 'checked' : ''}} id="question3No" />
              <label class="custom-control-label" for="question3No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea name="c3" class="form-control">{{ $Review_data[2]['comment'] }}</textarea>
                </div>
               </div>

               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Is the desired effectiveness of medication being achieved?
                </div>
                <input type="hidden" name="q4">
                <input type="hidden" value="{{ $Review_data[3]['id'] }}" name="r_id4">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r4" value="1" class="custom-control-input" {{ $Review_data[3]['response'] == 1 ? 'checked' : ''}} id="question4Yes" />
              <label class="custom-control-label" for="question4Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r4" value="0" class="custom-control-input"  {{ $Review_data[3]['response'] == '0' ? 'checked' : ''}} id="question4No" />
              <label class="custom-control-label" for="question4No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea name="c4" class="form-control">{{ $Review_data[3]['comment'] }}</textarea>
                </div>
               </div>

               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Are side effects, adverse reactions, error being reported?
                </div>
                <input type="hidden" name="q5">
                <input type="hidden" value="{{ $Review_data[4]['id'] }}" name="r_id5">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r5" value="1" class="custom-control-input" {{ $Review_data[4]['response'] == 1 ? 'checked' : ''}} id="question5Yes" />
              <label class="custom-control-label" for="question5Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r5" value="0" class="custom-control-input" {{ $Review_data[4]['response'] == '0' ? 'checked' : ''}} id="question5No" />
              <label class="custom-control-label" for="question5No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea name="c5" class="form-control">{{ $Review_data[4]['comment'] }}</textarea>
                </div>
               </div>

               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Is there a medical condition that should be addressed with medication regimen?
                </div>
                <input type="hidden" name="q6">
                <input type="hidden" value="{{ $Review_data[5]['id'] }}" name="r_id6">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r6" value="1" class="custom-control-input" {{ $Review_data[5]['response'] == 1 ? 'checked' : ''}} id="question6Yes" />
              <label class="custom-control-label" for="question6Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r6" value="0" class="custom-control-input" {{ $Review_data[5]['response'] == '0' ? 'checked' : ''}} id="question6No" />
              <label class="custom-control-label" for="question6No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea name="c6" class="form-control">{{ $Review_data[5]['comment'] }}</textarea>
                </div>
               </div>

               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Are any unwarranted medications being administered?
                </div>
                <input type="hidden" name="q7">
               <input type="hidden" value="{{ $Review_data[6]['id'] }}" name="r_id7">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r7" value="1" class="custom-control-input" {{ $Review_data[6]['response'] == 1 ? 'checked' : ''}} id="question7Yes" />
              <label class="custom-control-label" for="question7Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r7" value="0" class="custom-control-input" {{ $Review_data[6]['response'] == '0' ? 'checked' : ''}} id="question7No" />
              <label class="custom-control-label" for="question7No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea  name="c7"  class="form-control">{{ $Review_data[6]['comment'] }}</textarea>
                </div>
               </div>

               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Is there an overuse of a medication?
                </div>
                <input type="hidden" name="q8">
                <input type="hidden" value="{{ $Review_data[7]['id'] }}" name="r_id8">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2"> 
              <input type="radio" name="r8" value="1" class="custom-control-input" {{ $Review_data[7]['response'] == 1 ? 'checked' : ''}} id="question8Yes" />
              <label class="custom-control-label" for="question8Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio"  name="r8" value="0" class="custom-control-input" {{ $Review_data[7]['response'] == '0' ? 'checked' : ''}} id="question8No" />
              <label class="custom-control-label" for="question8No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea name="c8"  class="form-control">{{ $Review_data[7]['comment'] }}</textarea>
                </div>
               </div>

               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Is there an inappropriate drug dosage prescribed?
                </div>
                <input type="hidden" name="q9">
                 <input type="hidden" value="{{ $Review_data[8]['id'] }}" name="r_id9">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio"  name="r9" value="1" class="custom-control-input" {{ $Review_data[8]['response'] == 1 ? 'checked' : ''}} id="question9Yes" />
              <label class="custom-control-label" for="question9Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r9" value="0" class="custom-control-input" {{ $Review_data[8]['response'] == '0' ? 'checked' : ''}} id="question9No" />
              <label class="custom-control-label" for="question9No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea name="c9" class="form-control">{{ $Review_data[8]['comment'] }}</textarea>
                </div>
               </div>
               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Are there negative effects of drug interactions?
                </div>
                <input type="hidden" name="q10">
                 <input type="hidden" value="{{ $Review_data[9]['id'] }}" name="r_id10">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r10" value="1" class="custom-control-input" {{ $Review_data[9]['response'] == 1 ? 'checked' : ''}} id="question10Yes" />
              <label class="custom-control-label" for="question10Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r10" value="0" class="custom-control-input" {{ $Review_data[9]['response'] == '0' ? 'checked' : ''}} id="question10No" />
              <label class="custom-control-label" for="question10No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea name="c10" class="form-control">{{ $Review_data[9]['comment'] }}</textarea>
                </div>
               </div>

               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Is there adequate diagnostic medication available?
                </div>
                <input type="hidden" name="q11">
                 <input type="hidden" value="{{ $Review_data[10]['id'] }}" name="r_id11">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r11" value="1" class="custom-control-input" {{ $Review_data[10]['response'] == 1 ? 'checked' : ''}} id="question11Yes" />
              <label class="custom-control-label" for="question11Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r11" value="0" class="custom-control-input" {{ $Review_data[10]['response'] == '0' ? 'checked' : ''}} id="question11No" />
              <label class="custom-control-label" for="question11No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea name="c11" class="form-control">{{ $Review_data[10]['comment'] }}</textarea>
                </div>
               </div>

               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Is there review linked to the quality assurance planning?
                </div>
                <input type="hidden" name="q12">
                 <input type="hidden" value="{{ $Review_data[11]['id'] }}" name="r_id12">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r12" value="1" class="custom-control-input" {{ $Review_data[11]['response'] == 1 ? 'checked' : ''}} id="question12Yes" />
              <label class="custom-control-label" for="question12Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r12" value="0" class="custom-control-input" {{ $Review_data[11]['response'] == '0' ? 'checked' : ''}} id="question12No" />
              <label class="custom-control-label" for="question12No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea name="c12" class="form-control">{{ $Review_data[11]['comment'] }}</textarea>
                </div>
               </div>

               <div class="row d-flex align-items-center pharmacy-review-row">
                <div class="col-md-8 col-12 font-weight-bold">
                  Are recommendation forward to the resident's Primary Care Physician?
                </div>
                <input type="hidden" name="q13">
                 <input type="hidden" value="{{ $Review_data[12]['id'] }}" name="r_id13">
                <div class="col-md-4 col-12">
                  <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r13" value="1" class="custom-control-input" {{ $Review_data[12]['response'] == 1 ? 'checked' : ''}} id="question13Yes" />
              <label class="custom-control-label" for="question13Yes">Yes</label>
            </div>
            <div class="custom-control d-inline-block custom-radio mx-sm-2">
              <input type="radio" name="r13" value="0" class="custom-control-input" {{ $Review_data[12]['response'] == '0' ? 'checked' : ''}} id="question13No" />
              <label class="custom-control-label" for="question13No">No</label>
            </div>
                </div>
                <div class="col-12 mt-2">
                  <label class="mb-1">Comments</label>
                  <textarea name="c13" class="form-control">{{ $Review_data[12]['comment'] }}</textarea>
                </div>
               </div>
          </div>

        </div>
          <button type="submit" class="btn btn-info">Update</button>
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