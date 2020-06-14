@extends('layouts.default')
@section('content')        
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <form enctype="multipart/form-data" action="{{ route('profile-update') }}" method="post" name="profile" id="profile" autocomplete="off">
              @csrf
              <input type="hidden" value="{{ Helper::encrypt($userDetails->id)}}" name="user_detail_id">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">First Name <span class="required"> *</span></label>
                  <div class="col-sm-9">
                    <input type="text" id="first_name" name="first_name" class="form-control" value="{{ @$userDetails->first_name }}"/>
                    <?php if(@$errors->first('first_name')) { ?><span class="help-block error">{{@$errors->first('first_name')}}</span> <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Last Name <span class="required"> *</span></label>
                  <div class="col-sm-9">
                    <input type="text" id="last_name" name="last_name" class="form-control" value="{{ @$userDetails->last_name }}" />
                    <?php if(@$errors->first('last_name')) { ?><span class="help-block error">{{@$errors->first('last_name')}}</span> <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Gender <span class="required"> *</span></label>
                  <div class="col-sm-9">
                    <select class="form-control" name="gender">
                      <option value="1" @if(@$userDetails->gender == 1) selected=selected @endif >Male</option>
                      <option value="2" @if(@$userDetails->gender == 2) selected=selected @endif >Female</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Date of Birth <span class="required"> *</span></label>
                  <div class="col-sm-9">
                    <input type="text" readonly="true" class="form-control" value="{{ date(config('app.date_show_format'), strtotime($userDetails->dob)) }}" name = "dob" id = "dob" placeholder="dd/mm/yyyy"  data-toggle="datepicker"  />
                    <?php if(@$errors->first('dob')) { ?><span class="help-block error">{{@$errors->first('dob')}}</span> <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Phone No. <span class="required"> *</span></label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" name = "phone" id = "phone" placeholder="Phone No." value="{{@$userDetails->phone}}" />
                    <?php if(@$errors->first('phone')) { ?><span class="help-block error">{{@$errors->first('phone')}}</span> <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">File upload </label>
                  <div class="col-sm-9">                              
                        <input type="file" class="form-control file-upload-info " name="profile_image"  placeholder="Upload Image" />                              
                      <?php if(@$errors->first('profile_image')) { ?><span class="help-block error">{{@$errors->first('profile_image')}}</span> <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-9">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Address <span class="required"> *</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" id ="address" value="{{@$userDetails->address}}" />
                      <?php if(@$errors->first('address')) { ?><span class="help-block error">{{@$errors->first('address')}}</span> <?php } ?>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-6">
              <button type="submit" class="btn btn-primary mr-2"> Submit </button>
            <button class="btn btn-light">Cancel</button>
          </div>
          </div>
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
                    /* profile_image: {
                        required: true,
                        extension: "jpeg|png|svg|jpg|gif|max:2048"
                    }, */
                }
            });
});
</script>

@endsection