@extends('layouts.login')
@section('content')
  <h4>Welcome back!</h4>
  <h6 class="font-weight-light">Happy to see you again!</h6>
    <form method="POST" class="pt-3" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
      @csrf
    <div class="form-group">
      <label for="exampleInputEmail">{{ __('E-Mail Address') }}</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="mdi mdi-account-outline text-primary"></i>
          </span>
        </div>
        <input id="email" placeholder = "{{ __('E-Mail Address') }}" type="email" class="form-control form-control-lg border-left-0 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">{{ __('Password') }}</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="mdi mdi-lock-outline text-primary"></i>
          </span>
        </div>
        <input id="password" type="password" placeholder="Password" class="form-control form-control-lg border-left-0 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
          @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif

      </div>
    </div>
    <div class="my-2 d-flex justify-content-between align-items-center">
      <div class="form-check">
        <label class="form-check-label text-muted">
          <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >{{ __('Remember Me') }} </label>
      </div>
      <a class="auth-link text-black" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
    </div>
    <div class="my-3">
       <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-semibold auth-form-btn">{{ __('Login') }}</button>
    </div>
    <div class="mb-2 d-flex">
      <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
        <i class="mdi mdi-facebook mr-2"></i>Facebook </button>
      <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
        <i class="mdi mdi-google mr-2"></i>Google </button>
    </div>
    <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{route('register')}}" class="text-primary">Create</a>
    </div>
  </form>
@endsection