@extends("LaravelDashboard::home")

@section("content")

    @component("LaravelDashboard::components.navbar")

        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Laravel Dashboard</span>
                <h3 class="page-title" style="margin-top:10px;">Checkout Overview</h3>
            </div>

        @endcomponent

        <!-- Write your code here -->

            <div class="row">
                <div class="col-12">
                    <div class="card mb-5">
                        <div class="card-body">
                            <!-- Checkout Steps -->
                            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3" style="background-color:#E6E6E6;">
                                <li class="nav-item">
                                    <a href="#billing-information" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                        <i class="fa fa-user-circle font-18"></i>
                                        <span class="d-none d-lg-block">Billing Info</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#shipping-information" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                        <i class="fa fa-truck font-18"></i>
                                        <span class="d-none d-lg-block">Shipping Info</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#payment-information" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                        <i class="fa fa-credit-card font-18"></i>
                                        <span class="d-none d-lg-block">Payment Info</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Steps Information -->
                            <div class="tab-content">

                               <!-- Billing Infotmation -->

                                @component("LaravelDashboard::components.BillingInfo")

                                     <!--  order product -->

                                     @component("LaravelDashboard::components.order")

                                     @endcomponent

                                     <!-- end order product -->

                                @endcomponent

                                <!-- end billing Information -->

                                <!-- Shipping Content-->

                                <div class="tab-pane" id="shipping-information">
                                    <div class="row">
                                        <div class="col-lg-8">

                                            <h4 class="mt-4">Shipping Method</h4>

                                            <p class="text-muted mb-3">Fill the form below in order to
                                                    send you the order's invoice.</p>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="border p-3 rounded">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="shippingMethodRadio1" name="shippingOptions" class="custom-control-input" checked="">
                                                            <label class="custom-control-label font-16 font-weight-bold" for="shippingMethodRadio1">Standard Delivery - FREE</label>
                                                        </div>
                                                        <p class="mb-0 pl-3 pt-1">Estimated 5-7 days shipping (Duties and tax may be due upon delivery)</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="border p-3 rounded">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="shippingMethodRadio2" name="shippingOptions" class="custom-control-input">
                                                            <label class="custom-control-label font-16 font-weight-bold" for="shippingMethodRadio2">Fast Delivery - $25</label>
                                                        </div>
                                                        <p class="mb-0 pl-3 pt-1">Estimated 1-2 days shipping (Duties and tax may be due upon delivery)</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- end row-->

                                            <div class="row mt-4">
                                                <div class="col-sm-6">
                                                    <a href="apps-ecommerce-shopping-cart.html" class="btn text-muted d-none d-sm-inline-block btn-link font-weight-semibold">
                                                        <i class="mdi mdi-arrow-left"></i> Back to Shopping Cart </a>
                                                </div> <!-- end col -->
                                                <div class="col-sm-6">
                                                    <div class="text-sm-right">
                                                        <a href="apps-ecommerce-checkout.html" class="btn btn-danger">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i> Continue to Payment </a>
                                                    </div>

                                                </div>

                                                <!-- end col -->

                                            </div>

                                            <!-- end row -->

                                        </div>

                                        <div class="col-lg-4">

                                            <div class="border p-3 mt-4 mt-lg-0 rounded">

                                                <h4 class="header-title mb-3">Order Summary</h4>

                                                <div class="table-responsive">

                                                    <!--  order product -->
                                                    @component("LaravelDashboard::components.order")

                                                    @endcomponent
                                                    <!-- end order product -->

                                                </div>
                                                <!-- end table-responsive -->

                                            </div>
                                            <!-- end .border-->

                                        </div>
                                        <!-- end col -->

                                    </div>
                                    <!-- end row-->

                                </div>

                                <!-- End Shipping Information Content-->

                                <!-- Payment Account -->

                                @component("LaravelDashboard::components.payment")

                                    <!--  order product -->

                                    @component("LaravelDashboard::components.order")

                                    @endcomponent

                                    <!-- end order product -->

                                @endcomponent

                                <!-- End Payment Account -->

                            </div>

                            <!-- end tab content-->

                        </div>

                        <!-- end card-body-->

                    </div>

                    <!-- end card-->

                </div>

                <!-- end col -->

            </div>

            <!-- end code -->

        </div>

        <!-- footer -->

        @component("LaravelDashboard::components.footer",["top"=>"50px"])

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

        <!-- end footer-->

@endsection

@section('js')

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>

    <script>
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox:"{{ env('demo_sandbox_client_id') }}",
                production: "{{ env('demo_production_client_id') }}"
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'medium',
                color: 'blue',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: '1.01',
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    window.alert('Thank you for your purchase!');

                });
            }
        }, '#paypal-button');

    </script>

@endsection
