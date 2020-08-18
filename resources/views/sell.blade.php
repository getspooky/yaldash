@extends('laravelDash::layouts.master')

@section('title', 'Sell Overview'. ' | ' . config('app.name', 'Laravel'))

@section("content")

  @component("laravelDash::components.navbar")
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Laravel Dashboard</span>
        <h3 class="page-title" style="margin-top:10px;">Sell Overview</h3>
      </div>
      @endcomponent

      <div class="container-galeria">
        <div class="main_slider"
             style="background:url({{\yal\laraveldash\Helper\Assets::loadImg('sell_background.jpg')}})">
          <div class="container fill_height">
            <div class="row align-items-center fill_height">
              <div class="col">
                <div class="main_slider_content">
                  <h6>Spring / Summer Collection 2017</h6>
                  <h1>Get up to 30% Off New Arrivals</h1>
                  <div data-toggle="modal" data-target="#exampleModalCenter" class="red_button launch_now_button">Launch
                    now
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <form method="post" action="{{ route('dashboard.store.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="product-grid8">
                <div class="product-image8">
                  <a href="#">
                    <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo7/images/img-5.jpg">
                  </a>
                  <ul class="social">
                    <li><a href="#" class="fa fa-camera" onclick="document.getElementById('upload').click();"></a></li>
                  </ul>
                </div>
                <div class="product-content">
                  <input type="file" required name="file_name" style="display:none;" id="upload">
                  <div class="price">£ <input name="price" required type="number" class="sell_input" placeholder="0">
                  </div>
                  <span class="product-shipping">Free Shipping</span>
                  <h3 class="title"><a href="#"><input name="description" required class="sell_input"
                                                       style="width:100% !important;" type="text"
                                                       placeholder="Describe Your Product "></a></h3>
                  <a class="all-deals" href="">See all deals <i class="fa fa-angle-right icon"></i></a>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>

      </form>

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
