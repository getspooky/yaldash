@auth()
  @include('LaravelDashboard::layouts.navbars.navs.auth')
@endauth

@guest()
  @include('LaravelDashboard::layouts.navbars.navs.guest')
@endguest
