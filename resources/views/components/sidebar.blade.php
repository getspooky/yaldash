<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
  <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
    <div class="input-group input-group-seamless ml-3">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-search"></i>
        </div>
      </div>
      <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
    </div>
  </form>

  <div class="nav-wrapper">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ \yal\laraveldash\Helper\Helper::setActive('dashboard.home') }}" href="{{ route('dashboard.home') }}">
          <i class="material-icons">dashboard</i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ \yal\laraveldash\Helper\Helper::setActive('post.index') }}" href="{{ route('post.index')}}">
          <i class="material-icons">vertical_split</i>
          <span>Posts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ \yal\laraveldash\Helper\Helper::setActive('post.create') }}" href="{{route('post.create')}}">
          <i class="material-icons">note_add</i>
          <span>Add Post</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ \yal\laraveldash\Helper\Helper::setActive('dashboard.store.index') }}" href="{{route('dashboard.store.index')}}">
          <i class="material-icons">store_mall_directory</i>
          <span>Store</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ \yal\laraveldash\Helper\Helper::setActive('dashboard.sell.index') }}" href="{{route('dashboard.sell.index')}}">
          <i class="material-icons">shopping_cart</i>
          <span>Sell</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ \yal\laraveldash\Helper\Helper::setActive('dashboard.users') }}" href="{{ route('dashboard.users') }}">
          <i class="material-icons">supervised_user_circle</i>
          <span>Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ \yal\laraveldash\Helper\Helper::setActive('dashboard.checkout.index') }}" href="{{ route('dashboard.checkout.index') }}">
          <i class="material-icons">payment</i>
          <span>Checkout</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ \yal\laraveldash\Helper\Helper::setActive('dashboard.manage.index') }}" href="{{route('dashboard.manage.index')}}">
          <i class="material-icons">receipt</i>
          <span>Manage</span>
        </a>
      </li>
      {{ $slot }}
    </ul>
  </div>
</aside>
