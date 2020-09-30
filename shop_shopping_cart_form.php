<?php 
    session_start();
    include 'backend/pages/dbconnection/dbconnect.php';

    include 'include/header.php';
?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Shopping Cart</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Shopping Cart
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="content-body">
                <form action="#" class="icons-tab-steps checkout-tab-steps wizard-circle">

                    <!-- Checkout Place order starts -->
                    <h6><i class="step-icon step feather icon-shopping-cart"></i>Cart</h6>
                    <fieldset class="checkout-step-1 px-0">
                        <section id="place-order" class="list-view product-checkout">

                            <div class="checkout-items">

                                
                                <!-- REFER TO : add_to_cart_script -->


                            </div>

                            <div class="checkout-options">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <p class="options-title" align="center">Baibao Online Shop</p>
                                            <div class="coupons">
                                                <div class="coupons-title">
                                                    <p>Buyer Name & ID</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="price-details">
                                                <p>Price Details</p>
                                            </div>
                                            
                                            <div class="checkoutsummary">


                                                <!-- REFER TO : add_to_cart_script -->

                                                
                                            </div>

                                            <div class="disablecheckout">
                                                

                                                <!-- REFER TO : add_to_cart_script -->


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </fieldset>
                    <!-- Checkout Place order Ends -->

                    <!-- Checkout Customer Address Starts -->
                    <h6><i class="step-icon step feather icon-home"></i>Address</h6>
                    <fieldset class="checkout-step-2 px-0">
                        <section id="checkout-address" class="list-view product-checkout">

                            <div class="card">
                                <div class="card-header flex-column align-items-start">
                                    <h4 class="card-title">Tell Us Your Address! So That We Can Send Your Product There!</h4>
                                    <p class="text-muted mt-25">Be sure to check "Deliver to this address" when you have finished</p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="checkout-name">Your Address:</label>
                                                    <input type="text" id="checkout-name" class="form-control O_address required" placeholder="Type Your Address Here!">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="checkout-apt-number">Mobile Number:</label>
                                                    <input type="text" id="checkout-apt-number" class="form-control O_phone_number required" placeholder="Type Your Phone Number Here!">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <!-- Counter Textarea start -->
                                                <section class="counter-textarea">
                                                    <h4 class="card-title">Your Notes</h4>
                                                    <p class="mb-2">Here You Can Tell Us More About This Order Information</p>
                                                    <fieldset class="form-label-group mb-0">
                                                        <textarea data-length=100 class="form-control char-textarea Notes" id="textarea-counter" rows="3" placeholder="Type Your Note Here!"></textarea>
                                                        <label for="textarea-counter">Make Sure Your Note Is Not Too Long</label>
                                                    </fieldset>
                                                    <small class="counter-value float-right"><span class="char-count">0</span> / 100 </small>
                                                </section>
                                                <!-- Counter Textarea end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="customer-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">We Are Almost There</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body actions">
                                            Image
                                            <hr>
                                            <div class="btn btn-primary btn-block delivery-address">DELIVER TO THIS ADDRESS</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </fieldset>

                    <!-- Checkout Customer Address Ends -->

                    <!-- Checkout Payment Starts -->
                    <h6><i class="step-icon step feather icon-credit-card"></i>Payment & Shipment</h6>
                    <fieldset class="checkout-step-3 px-0">
                        <section id="checkout-payment" class="list-view product-checkout">

                            <div class="payment-type">
                                <div class="card">
                                    <div class="card-header flex-column align-items-start">
                                        <h4 class="card-title">Payment & Shipment options</h4>
                                        <p class="text-muted mt-25">Be sure to click on correct payment & shipment option</p>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <hr>
                                            <!-- Radio Buttons start -->
                                            <section class="vuexy-radio">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Choose Your Favor Shipment</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>Depending on the Shipping Company, The Price May Vary.</p>
                                                                    <ul class="list-unstyled mb-0">
                                                                        <li class="d-inline-block mr-2">
                                                                            <fieldset>
                                                                                <div class="vs-radio-con">
                                                                                    <input type="radio" class="Shipment_type" name="Shipment_type" checked value="Express (24HRs)">
                                                                                    <span class="vs-radio">
                                                                                        <span class="vs-radio--border"></span>
                                                                                        <span class="vs-radio--circle"></span>
                                                                                    </span>
                                                                                    <span class="">Express (24HRs)</span>
                                                                                </div>
                                                                            </fieldset>
                                                                        </li>
                                                                        <li class="d-inline-block mr-2">
                                                                            <fieldset>
                                                                                <div class="vs-radio-con">
                                                                                    <input type="radio" class="Shipment_type" name="Shipment_type" value="Regular (4Days)">
                                                                                    <span class="vs-radio">
                                                                                        <span class="vs-radio--border"></span>
                                                                                        <span class="vs-radio--circle"></span>
                                                                                    </span>
                                                                                    <span class="">Regular (4Days)</span>
                                                                                </div>
                                                                            </fieldset>
                                                                        </li>
                                                                        <li class="d-inline-block mr-2">
                                                                            <fieldset>
                                                                                <div class="vs-radio-con">
                                                                                    <input type="radio" class="Shipment_type" name="Shipment_type" value="Saving (10Days)">
                                                                                    <span class="vs-radio">
                                                                                        <span class="vs-radio--border"></span>
                                                                                        <span class="vs-radio--circle"></span>
                                                                                    </span>
                                                                                    <span class="">Saving (10Days)</span>
                                                                                </div>
                                                                            </fieldset>
                                                                        </li>
                                                                        <li class="d-inline-block">
                                                                            <fieldset>
                                                                                <div class="vs-radio-con">
                                                                                    <input type="radio" class="Shipment_type" name="Shipment_type" value="Saving (14Days)">
                                                                                    <span class="vs-radio">
                                                                                        <span class="vs-radio--border"></span>
                                                                                        <span class="vs-radio--circle"></span>
                                                                                    </span>
                                                                                    <span class="">Saving (14Days)</span>
                                                                                </div>
                                                                            </fieldset>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- Radio Buttons end -->
                                            <hr>
                                            <!-- Radio Buttons start -->
                                            <section class="vuexy-radio">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Choose Your Payment Type</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <ul class="list-unstyled mb-0">
                                                                        <li class="d-inline-block mr-2">
                                                                            <fieldset>
                                                                                <div class="vs-radio-con">
                                                                                    <input type="radio" class="Payment_type" name="Payment_type" checked value="Paywithcard">
                                                                                    <span class="vs-radio">
                                                                                        <span class="vs-radio--border"></span>
                                                                                        <span class="vs-radio--circle"></span>
                                                                                    </span>
                                                                                    <span class="">Pay With Credit Card</span>
                                                                                </div>
                                                                            </fieldset>
                                                                        </li>
                                                                        <li class="d-inline-block mr-2">
                                                                            <fieldset>
                                                                                <div class="vs-radio-con">
                                                                                    <input type="radio" class="Payment_type" name="Payment_type" value="Payincash">
                                                                                    <span class="vs-radio">
                                                                                        <span class="vs-radio--border"></span>
                                                                                        <span class="vs-radio--circle"></span>
                                                                                    </span>
                                                                                    <span class="">Pay With Cash</span>
                                                                                </div>
                                                                            </fieldset>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="form-group">
                                                                        <label for="checkout-name">Your Credit Card Number:</label>
                                                                        <input type="text" id="checkout-name" class="form-control Credit_card_number" placeholder="Type Your Credit Card Number Here!">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- Radio Buttons end -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="amount-payable checkout-options">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Here is Your Final Checkout Details</h3>
                                    </div>
                                    <hr>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="finalcheckoutsummary">


                                                <!-- REFER TO : add_to_cart_script -->

                                                
                                            </div>
                                            
                                            <!-- REFER TO ADD TO CART SCRIPT => SHOP SEND ORDER PHP -->
                                            <!-- <input type="hidden" name="total" class="total">
                                            <div class="btn btn-primary btn-block place-order buy_now">ORDER NOW!</div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </fieldset>

                    <!-- Checkout Payment Starts -->
                </form>

            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php 
    include 'include/footer.php';
?>