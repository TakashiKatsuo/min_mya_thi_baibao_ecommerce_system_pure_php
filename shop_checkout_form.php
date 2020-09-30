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
                            <h2 class="content-header-title float-left mb-0">Checkout</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="index.php">Shopping Products</a>
                                    </li>
                                    <li class="breadcrumb-item active">Checkout
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="content-body">
                <form action="#" class="icons-tab-steps checkout-tab-steps wizard-circle">

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
                                                    <input type="text" id="checkout-name" class="O_address form-control required" placeholder="Type Your Address Here!">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="checkout-apt-number">Mobile Number:</label>
                                                    <input type="text" id="checkout-apt-number" class="O_phone_number form-control required" placeholder="Type Your Phone Number Here!">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <!-- Counter Textarea start -->
                                                <section class="counter-textarea">
                                                    <h4 class="card-title">Your Notes</h4>
                                                    <p class="mb-2">Here You Can Tell Us More About This Order Information</p>
                                                    <fieldset class="form-label-group mb-0">
                                                        <textarea data-length=100 class="Notes form-control char-textarea" id="textarea-counter" rows="3" placeholder="Type Your Note Here!"></textarea>
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

                                                                    <div class="col-sm-6 col-12">
                                                                        <div class="text-bold-600 font-medium-2">
                                                                            Shipping Provider Lists
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <select name="Shipping_id" class="Shipping_id select2 form-control" required>
                                                                                <option value = "" selected hidden disabled>Choose Shipping method...</option>
                                                                                <?php  
                                                                                    $sql = "SELECT * FROM shippings";
                                                                                    $stmt = $pdo->prepare($sql);
                                                                                    $stmt->execute();
                                                                                    $shippings = $stmt->fetchAll();

                                                                                    foreach ($shippings as $shipping) { ?> 

                                                                                    <optgroup label="<?= $shipping['Shipping_id'] ?>">
                                                                                        <option value="<?= $shipping['Shipping_id'] ?>" class="shippingcalcs" id="<?= $shipping['Shipping_id'] ?>">
                                                                                            <?= $shipping['Shipping_name'] ?> / Per Order Price: <?= $shipping['Per_order_price'] ?> MMK / Per Item Price: <?= $shipping['Per_item_price'] ?> MMK / Per Weight Price: <?= $shipping['Per_weight_price'] ?> MMK</option>
                                                                                    </optgroup>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

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
                                                                                    <input type="radio" class="Payment_type" name="Payment_type" value="Paywithcard" onChange="display(this)" checked>
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
                                                                                    <input type="radio" class="Payment_type" name="Payment_type" value="Payincash" onChange="display(this)">
                                                                                    <span class="vs-radio">
                                                                                        <span class="vs-radio--border"></span>
                                                                                        <span class="vs-radio--circle"></span>
                                                                                    </span>
                                                                                    <span class="">Pay With Cash</span>
                                                                                </div>
                                                                            </fieldset>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="form-group" id="creditcardnumber" style="display: block;">
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

                                            <div id="show_shippingcalculation">
                                               
                                            </div>
                                            
                                            <!-- REFER TO ADD TO CART SCRIPT => SHOP SEND ORDER PHP -->
                                            <input type="hidden" name="" class="total">
                                            <input type="hidden" name="" class="totaldiscount">
                                            <input type="hidden" name="" class="totalweight">
                                            <input type="hidden" name="" class="totalqty">

                                            <?php if (isset($_SESSION['user']) && $_SESSION['user']['User_approval']==1) { ?>

                                            <div class="btn btn-primary btn-block place-order buy_now">ORDER NOW!</div>

                                            <?php } else { ?>

                                            <a href="backend/pages/auth_register_form.php" class="btn btn-primary btn-block">LOGIN OR REGISTER NOW TO ORDER!</a>
                                            <?php } ?>
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


<!-- Script -->
<script>

    function display(x) {

        if(x.value == 'Paywithcard'){
            document.getElementById("creditcardnumber").style.display = 'block';
        } else {
            document.getElementById("creditcardnumber").style.display = 'none';
        }
    }

    $(document).ready(function(){
        $(document).on('click', '.shippingcalcs', function(){  
            var Shippingid = $(this).attr("id");  
            if(Shippingid != ''){  
                $.ajax({  
                    url:"shop_calculate_shipping.php",  
                    method:"POST",  
                    data:{Shippingid:Shippingid},  
                    success:function(data){  
                        $('#show_shippingcalculation').html(data);  
                        $('#dataModal').modal('show');  
                    }  
                });  
            }            
        });
    });
</script>