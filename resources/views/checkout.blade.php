@extends('laravelDash::layouts.master')

@section('title', 'Checkout'. ' | ' . config('app.name', 'Laravel'))

@section("content")

  @component("laravelDash::components.navbar")
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Laravel Dashboard</span>
        <h3 class="page-title" style="margin-top:10px;">Checkout Overview</h3>
      </div>
      @endcomponent

      <div class="row">
        <div class="col-12">
          <div class="card mb-5">
            <div class="card-body">
              <div class="tab-content">
                @component("laravelDash::components.payment")
                  @component("laravelDash::components.order",['products'=>$products])
                    <tr class="text-right">
                      <td>
                        <h6 class="m-0">Shipping:</h6>
                      </td>
                      <td class="text-right">
                        FREE
                      </td>
                    </tr>
                  @endcomponent
                @endcomponent
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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

    <div id="paypal-button"></div>

@endsection
