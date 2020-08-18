<nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
  <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
    <div class="input-group input-group-seamless ml-3">
    </div>
  </form>

  <ul class="navbar-nav border-left flex-row ">
    <li class="nav-item border-right dropdown notifications">
      <a class="nav-link nav-link-icon text-center" data-toggle="dropdown" href="#" role="button" id="dropdownMenuLink"
         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="nav-link-icon__wrapper">
          <i class="material-icons">&#xE7F4;</i>
          <span
            class="badge badge-pill badge-danger">{{ optional(\yal\laraveldash\Helper\Helper::Notifications(auth()->id()))->count() }}</span>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenuLink">
        @if(optional(auth()->user()->unreadNotifications)->count()>0)
          @foreach(auth()->user()->unreadNotifications as $notification)
            <a class="dropdown-item" href="#">
              <div class="notification__icon-wrapper">
                <div class="notification__icon">
                  <i class="material-icons">notification_important</i>
                </div>
              </div>
              <div class="notification__content">
                <span class="notification__category">{{ ucfirst($notification->data['type']) }}</span>
                <p>{{ ucfirst($notification->data['name']) }} {{ $notification->data['message']}} </p>
              </div>
            </a>
            {{$notification->markAsRead()}}
          @endforeach
          <a class="dropdown-item notification__all text-center" href=""> Mark all Notifications as Read </a>
        @else
          <a class="dropdown-item" href="#">
            <div class="notification__icon-wrapper">
              <div class="notification__icon">
                <i class="material-icons">contact_support</i>
              </div>
            </div>
            <div class="notification__content">
              <span class="notification__category">Support</span>
              <p>You have not received any notification</p>
            </div>
          </a>
        @endif
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button"
         aria-haspopup="true" aria-expanded="false">
        <img class="user-avatar rounded-circle mr-2" width="50" height="40"
             src="{{ \yal\laraveldash\Helper\Helper::UploadedAvatar(auth()->user()) }}" alt="User Avatar">
        <span class="d-none d-md-inline-block">{{ auth()->user()->name }}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-small">
        <form method="post" id="logout" action="{{ route('logout') }}">
          @csrf
          <a class="dropdown-item text-danger" href="#" onclick="document.getElementById('logout').submit()">
            <i class="material-icons text-danger">&#xE879;</i> Logout </a>
        </form>
      </div>
    </li>
  </ul>

  <nav class="nav">
    <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
       data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
      <i class="material-icons">&#xE5D2;</i>
    </a>
  </nav>

</nav>

</div>

<div class="main-content-container container-fluid px-4">
  {{ $slot }}
</div>
