@extends("layouts.app")

@section("content")
  <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <small>{{ __('Verify Your Email Address') }}</small>
            </div>
            <div>
              @if (session('resent'))
                <div class="alert alert-success" role="alert">
                  {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
              @endif

              {{ __('Before proceeding, please check your email for a verification link.') }}

              @if (Route::has('verification.resend'))
                {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
