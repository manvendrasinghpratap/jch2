@extends('layouts.login')
@section('content')
		<h4>New here?</h4>
		<h6 class="font-weight-light">Join us today! It takes only few steps</h6>
		<form class="pt-3" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
		 @csrf
		  <div class="form-group">
			<label>{{ __('Name') }}</label>
			<div class="input-group">
			  <div class="input-group-prepend bg-transparent">
				<span class="input-group-text bg-transparent border-right-0">
				  <i class="mdi mdi-account-outline text-primary"></i>
				</span>
			  </div>			  
				<input id="name" type="text" class="form-control form-control-lg border-left-0 {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus placeholder="{{ __('Name') }}">
				@if ($errors->has('name'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
				@endif
								
			</div>
		  </div>
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

		  <div class="form-group">
			<label>{{ __('Password') }}</label>
			<div class="input-group">
			  <div class="input-group-prepend bg-transparent">
				<span class="input-group-text bg-transparent border-right-0">
				  <i class="mdi mdi-lock-outline text-primary"></i>
				</span>
			  </div>
			  <input id="password" type="password" class="form-control form-control-lg border-left-0 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}">
				@if ($errors->has('password'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif							
			</div>
		  </div>
		  <div class="form-group">
			<label>{{ __('Confirm Password') }}</label>
			<div class="input-group">
			  <div class="input-group-prepend bg-transparent">
				<span class="input-group-text bg-transparent border-right-0">
				  <i class="mdi mdi-lock-outline text-primary"></i>
				</span>
			  </div>
			  <input id="password-confirm" type="password" class="form-control form-control-lg border-left-0 " name="password_confirmation" required placeholder="{{ __('Confirm Password') }}">
						
			</div>
		  </div>
		  <div class="mt-3">
		   <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-semibold auth-form-btn">{{ __('Register') }}</button>			
		  </div>
		  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
		  </div>
		</form>
@endsection