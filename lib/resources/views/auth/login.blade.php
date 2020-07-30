@extends("layouts.app")

@section("content")

    <!-- ============================================-->
    <!-- <section> Login ============================-->
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
                        <h1 class="mb-1">Welcome back</h1>
                        <span>Enter your account details below</span>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input id="email" type="email" placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="password"  placeholder="Password"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <small><a href="{{ route('password.request') }}">Forgot your password?</a>
                            </small>
                        </div>
                        <div class="form-group">
                            <button class="btn-block btn-lg btn-primary" type="submit">Sign in</button>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label text-small text-muted" for="login-remember">Keep me signed in</label>
                        </div>
                        <hr>
                        <div class="text-center text-small text-muted">
                            <span>Don't have an account yet? <a href="{{ route('register') }}">Create one</a>
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
