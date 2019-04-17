@extends("layouts.app")

@section("content")

    <!-- ============================================-->
    <!-- <section> Register ============================-->

    <section class="min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center mb-md-6">
                <div class="col-auto">
                    <img src="{{ \Yasser\LaravelDashboard\Helper\Assets::loadImg(config('laravelDash.logo')) }}">
                </div>
            </div>
            <div class="row justify-content-center pt-6">
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="text-center mb-4">
                        <h1 class="mb-1">Create Account</h1>
                        <span>No credit card required</span>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                     @csrf
                    <div class="form-group">
                        <input id="name" type="text" placeholder="First Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                        <div class="form-group">
                            <input id="email" type="email" placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <small class="text-muted">Must be at least 8 characters</small>
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <button class="btn-block btn btn-primary" type="submit">Sign in</button>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="signup-agree">
                            <label class="custom-control-label text-small text-muted" for="signup-agree">I agree to the <a href="#">Terms &amp;
                                    Conditions</a>
                            </label>
                        </div>
                        <hr>
                        <div class="text-center text-small text-muted">
                            <span>Already have an account yet? <a href="{{ route('login') }}">Sign In</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- <section> close ============================-->
    <!-- ============================================-->


@endsection
