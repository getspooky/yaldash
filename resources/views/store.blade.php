@extends('laravelDash::layouts.master')

@section('title', 'Store Overview'. ' | ' . config('app.name', 'Laravel'))

@section("content")

  @component("laravelDash::components.navbar")
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">laraveldash</span>
        <h3 class="page-title" style="margin-top:10px;">Store Overview</h3>
      </div>
      @endcomponent

      @if($store->count()>0)

        <div class="row">
          @foreach($store as $store)
            <div class="col-md-4 col-sm-6">
              <div class="product-grid8">
                <div class="product-image8">
                  <a href="#">
                    <img class="pic-1"
                         src="{{ asset('storage/avatars/'.$store->attachementStore()->first()['file_name'])}}">
                  </a>
                  <form method="post" id="card-store" action="{{ route('dashboard.store.buy',['id'=>$store->id]) }}">
                    @csrf
                    <ul class="social">
                      <li><a href="#" onclick="document.getElementById('card-store').submit();"
                             class="fa fa-cart-plus"></a></li>
                    </ul>
                  </form>
                  <span class="product-discount-label">0%</span>
                </div>
                <div class="product-content">
                  <div class="price">£ {{$store->price}}
                  </div>
                  <span class="product-shipping">Free Shipping</span>
                  <h3 class="title"><a href="#">{{ $store->description }}</a></h3>
                  <a class="all-deals" href="">See all deals <i class="fa fa-angle-right icon"></i></a>
                </div>
              </div>
            </div>
          @endforeach

        </div>

      @else
        <div class="jumbotron">
          <h1 class="display-4">{{ config('laravelDash.views.Store.intro_store') }}</h1>
          <p class="lead"></p>
          <hr class="my-4">
          <p>{{ config('laravelDash.views.Store.desc_store') }}</p>
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('dashboard.sell.index') }}" role="button">Sell Product</a>
          </p>
        </div>
      @endif

    </div>

    <br>

    @component("laravelDash::components.footer",["top"=>"50px"])
      <div class="col-md-3 col-sm-6 footer-col">
        <h6 class="heading7">Social Media</h6>
        <ul class="footer-social">
          <li><i class="fa fa-linkedin social-icon linked-in" aria-hidden="true"></i></li>
          <li><i class="fa fa-facebook social-icon facebook" aria-hidden="true"></i></li>
          <li><i class="fa fa-twitter social-icon twitter" aria-hidden="true"></i></li>
          <li><i class="fa fa-google-plus social-icon google" aria-hidden="true"></i></li>
        </ul>
      </div>
      @endcomponent

      </div>

@endsection
