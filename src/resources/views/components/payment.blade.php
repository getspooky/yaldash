<!-- Payment Content-->
<div class="tab-pane" id="payment-information">
    <div class="row">

        <div class="col-lg-8">
            <h4 class="mt-2">Payment Selection</h4>

            <p class="text-muted mb-4">Fill the form below in order to
                send you the order's invoice.</p>

            <!-- Pay with Paypal box-->
            <div class="border p-3 mb-3 rounded">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="BillingOptRadio2" name="billingOptions" class="custom-control-input" checked>
                            <label class="custom-control-label font-16 font-weight-bold" for="BillingOptRadio2">Pay with Paypal</label>
                        </div>
                        <p class="mb-0 pl-3 pt-1">You will be redirected to PayPal website to complete your purchase securely.
                        <div id="paypal-button" class="mt-3"></div>
                        </p>
                    </div>
                    <div class="col-sm-4 text-sm-right mt-3 mt-sm-0">
                        <img src="{{asset('assets/iconfinder__Paypal-39_1156727.png')}}" height="90" width="90">
                    </div>
                </div>
            </div>
            <!-- end Pay with Paypal box-->

            <div class="row mt-4">
                <div class="col-sm-6">
                    <a href="apps-ecommerce-shopping-cart.html" class="btn text-muted d-none d-sm-inline-block btn-link font-weight-semibold">
                        <i class="mdi mdi-arrow-left"></i> Back to Shopping Cart
                    </a>
                </div> <!-- end col -->
                <div class="col-sm-6">
                    <div class="text-sm-right">
                        <a href="apps-ecommerce-checkout.html" class="btn btn-danger">
                            <i class="mdi mdi-cash-multiple mr-1"></i> Complete Order
                        </a>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row-->
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            <div class="border p-3 mt-4 mt-lg-0 rounded">
                <h4 class="header-title mb-3">Order Summary</h4>

                <div class="table-responsive">

                    {{$slot}}

                </div>
                <!-- end table-responsive -->

            </div> <!-- end .border-->

        </div> <!-- end col -->

    </div> <!-- end row-->

</div>

<!-- End Payment Information Content-->