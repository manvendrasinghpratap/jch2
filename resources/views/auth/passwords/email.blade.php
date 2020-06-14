@extends('layouts.login')
@section('content')
		<h4>{{ __('Reset Password') }}!!</h4>
		<h6 class="font-weight-light"> It takes only few steps</h6>
		<form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
		 @csrf
		  <div class="form-group">
			<label>{{ __('E-Mail Address') }}</label>
			<div class="input-group">
			  <div class="input-group-prepend bg-transparent">
				<span class="input-group-text bg-transparent border-right-0">
				  <i class="mdi mdi-email-outline text-primary"></i>
				</span>
			  </div>
			  <input id="email" type="email" class="form-control form-control-lg border-left-0 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="{{ __('E-Mail Address') }}">
				@if ($errors->has('email'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
								
			</div>
		  </div>
		  <div class="mt-3">
		   <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-semibold auth-form-btn">{{ __('Send Password Reset Link') }}</button>			
		  </div>
		  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
		  </div>
		</form>
@endsection
