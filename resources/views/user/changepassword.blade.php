@extends('layouts.default')
@section('content')        
  <div class="row">
      <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <!-- <h4 class="card-title">Basic form elements</h4>
              <p class="card-description">Basic form elements</p> -->
              <form enctype="multipart/form-data" action="{{ route('update-change-password') }}" method="post" name="changepassword" id="changepassword" autocomplete="off">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="exampleInputName1">Old Password</label>
                  <input type="password" class="form-control" id="exampleInputName1" placeholder="Old Password" name="old_password" id="old_password" />
                  @if ($errors->has('old_password'))<span class="help-block error">{{ $errors->first('old_password') }}</span> @endif
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword4">New Password</label>
                  <input type="password" class="form-control"  placeholder="New Password" name="new_password" id="new_password" />
                  @if ($errors->has('new_password'))<span class="help-block error">{{ $errors->first('new_password') }}</span> @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword5">Confirm Password</label>
                  <input type="password" class="form-control"  placeholder="Confirm Password" name="confirm_password" id="confirm_password" />
                </div>
                <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
      </div>              
  </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            initDatepicker();
            $('#changepassword_').validate({ // initialize the plugin
                rules: {
                    old_password: {
                        required: true
                    },
                    new_password: {
                        required: true,
                        minlength : 6
                    },
                    confirm_password: {
                        minlength : 6,
                        required: true,
                        equalTo : "#new_password"
                    },                   
                }
            });
});
</script>

@endsection