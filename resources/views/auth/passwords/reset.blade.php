@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="header">
        <h4 class="title">{{ __('Reset Password') }}</h4>
      </div>

      <div class="content">
        <form
          class="form-horizontal"
          method="POST"
          action="{{ route('password.request') }}"
          aria-label="{{ __('Reset Password') }}"
        >
          @csrf

          <input type="hidden" name="token" value="{{ $token }}">

          <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
              <input
                id="email"
                type="email"
                class="form-control border-input"
                name="email"
                value="{{ $email ?? old('email') }}"
                required
                autofocus
              >

              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">{{ __('Password') }}</label>

            <div class="col-md-6">
              <input
                id="password"
                type="password"
                class="form-control border-input"
                name="password"
                required
              >

              @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
              <input
                id="password-confirm"
                type="password"
                class="form-control border-input"
                name="password_confirmation"
                required
              >
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary btn-fill">
                {{ __('Reset Password') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
