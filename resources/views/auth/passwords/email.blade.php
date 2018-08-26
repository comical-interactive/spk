@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="header">
        <h4 class="title">{{ __('Reset Password') }}</h4>
      </div>

      <div class="content">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif

        <form
          class="form-horizontal"
          method="POST"
          action="{{ route('password.email') }}"
          aria-label="{{ __('Reset Password') }}"
        >
          @csrf

          <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
              <input
                id="email"
                type="email"
                class="form-control border-input"
                name="email"
                value="{{ old('email') }}"
                required
              >

              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary btn-fill">
                {{ __('Send Password Reset Link') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
