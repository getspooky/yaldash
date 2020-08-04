@extends("layouts.app")

@section("content")
  <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
          <div class="card-header bg-transparent pb-5">
            <div class="text-muted text-center mt-2 mb-3">
              <small>{{ __('Sign in with') }}</small>
            </div>
            <div class="btn-wrapper text-center">
              <a href="#" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon">
                  <img src="{{ \LaravelDashboard\Helper\Assets::load('svg', 'github.svg') }}">
                </span>
                <span class="btn-inner--text">{{ __('Github') }}</span>
              </a>
              <a href="#" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon">
                  <img src="{{ \LaravelDashboard\Helper\Assets::load('svg', 'google.svg') }}">
                </span>
                <span class="btn-inner--text">{{ __('Google') }}</span>
              </a>
            </div>
          </div>
          <div class="card-body px-lg-5 py-lg-5">
            <form role="form" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}"  required autofocus>
                </div>
                @if ($errors->has('email'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="ni ni-lock-circle-open"></i>
                    </span>
                  </div>
                  <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password"  required>
                </div>
                @if ($errors->has('password'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="customCheckLogin">
                  <span class="text-muted">{{ __('Remember me') }}</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">{{ __('Sign in') }}</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6">
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="text-light">
                <small>{{ __('Forgot password?') }}</small>
              </a>
            @endif
          </div>
          <div class="col-6 text-right">
            <a href="{{ route('register') }}" class="text-light">
              <small>{{ __('Create new account') }}</small>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
