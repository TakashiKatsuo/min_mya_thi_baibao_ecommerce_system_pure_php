<?php 
    session_start();
    include 'backend/pages/dbconnection/dbconnect.php';

    $orderid = $_SESSION['orderinvoice'];

    $sql = "SELECT orders.*, shippings.* FROM orders INNER JOIN shippings ON orders.Shipping_id=shippings.Shipping_id
    WHERE Order_id=:orderid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':orderid', $orderid);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC); 

    $sql = "SELECT orders.*, users.* FROM orders INNER JOIN users ON orders.User_id=users.User_id
    WHERE Order_id=:orderid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':orderid', $orderid);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC); 

    $sql1 = "SELECT orderdetails.*, products.* FROM orderdetails INNER JOIN products ON orderdetails.Product_id = products.Product_id WHERE orderdetails.Order_id=:orderid";
    $stmt = $pdo->prepare($sql1);
    $stmt->bindParam(':orderid', $orderid);
    $stmt->execute();
    $orderdetails = $stmt->fetchAll(); 

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
                            <h2 class="content-header-title float-left mb-0">Invoice</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="index.php">Shopping Products</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="shop_shopping_cart_form.php">Shopping Cart</a>
                                    </li>
                                    <li class="breadcrumb-item active">Invoice
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- invoice functionality start -->
                <section class="invoice-print mb-1">
                    <div class="row">

                        <fieldset class="col-12 col-md-5 mb-1 mb-md-0">
                           
                        </fieldset>
                        <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
                            <button class="btn btn-primary btn-print mb-1 mb-md-0"> <i class="feather icon-file-text"></i> Print</button>
                        </div>
                    </div>
                </section>
                <!-- invoice functionality end -->
                <!-- invoice page -->
                <section class="card invoice-page">
                    <div id="invoice-template" class="card-body">
                        <!-- Invoice Company Details -->
                        <div id="invoice-company-details" class="row">
                            <div class="col-sm-6 col-12 text-left pt-1">
                                <div class="media pt-1">
                                    <img src="backend/images/Logo.png" alt="company logo" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 text-right">
                                <h1>Invoice</h1>
                                <div class="invoice-details mt-2">
                                    <h6>INVOICE NO.</h6>
                                    <p><?= $order['Order_id'] ?></p>
                                    <h6 class="mt-2">INVOICE DATE</h6>
                                    <p><?= $order['created_at'] ?></p>
                                </div>
                            </div>
                        </div>
                        <!--/ Invoice Company Details -->

                        <!-- Invoice Recipient Details -->
                        <div id="invoice-customer-details" class="row pt-2">
                            <div class="col-sm-6 col-12 text-left">
                                <h5>Recipient</h5>
                                <div class="recipient-info my-2">
                                    <p>Customer ID: <?= $order['User_id'] ?></p>
                                    <p>Customer Name: <?= $user['Fullname'] ?></p>
                                    <p>Address: <?= $order['O_address'] ?></p>
                                    <p>Phone Number: <?= $order['O_phone_number'] ?></p>
                                    <p>Remark: <?= $order['Notes'] ?></p>
                                </div>
                                <div class="recipient-contact pb-2">
                                    <p>
                                        <i class="feather icon-mail"></i>
                                        <?= $user['Email'] ?>
                                    </p>
                                    <p>
                                        <i class="feather icon-phone"></i>
                                        <?= $user['Phone_number'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 text-right">
                                <h5>Baibao Online Shop. Ltd.</h5>
                                <div class="company-info my-2">
                                    <p>Pyi Myanmar Condominium, Yankin Township</p>
                                    <p>Phone Number: +95 9529180</p>
                                </div>
                                <div class="company-contact">
                                    <p>
                                        <i class="feather icon-mail"></i>
                                        baibao@gmail.com
                                    </p>
                                    <p>
                                        <i class="feather icon-phone"></i>
                                        +95 9529180
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/ Invoice Recipient Details -->

                        <!-- Invoice Items Details -->
                        <div id="invoice-items-details" class="pt-1 invoice-items-table">
                            <div class="row">
                                <div class="table-responsive col-12">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Variant</th>
                                                <th>Per Variant Option Cost</th>
                                                <th>Per Price</th>
                                                <th>Per Weight</th>
                                                <th>Quantity</th>
                                                <th>Final Sub Total Price (Per Price + Per Variant Option Price) x Quantity</th>
                                                <th>From Discounts</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orderdetails as $orderdetail) { 

                                                $productvariantoption="";

                                                if ($orderdetail['Product_variant_option']=='') {
                                                    $productvariantoption="Default";
                                                } else {
                                                    $productvariantoption=$orderdetail['Product_variant_option'];
                                                }?>

                                                <tr>
                                                    <td><?= $orderdetail['Product_name'] ?></td>
                                                    <td><?= $productvariantoption ?></td>
                                                    <td><?= number_format($orderdetail['Product_vop'], 2, '.', ',') ?> MMK</td>
                                                    <td><?php 
                                                            $price="";

                                                            if ($orderdetail['Product_discounted_price']) {
                                                            echo number_format($orderdetail['Product_discounted_price'], 2, '.', ',') ; 
                                                            $price=$orderdetail['Product_discounted_price'];?>MMK

                                                    <del><?= number_format($orderdetail['Product_price'], 2, '.', ',') ?>MMK</del>

                                                            <?php } else { echo number_format($orderdetail['Product_price'], 2, '.', ',') ; 
                                                            $price=$orderdetail['Product_price'];?>MMK <?php } ?></td>

                                                    <td><?= $orderdetail['Product_weight'] ?> lb</td>
                                                    <td><?= $orderdetail['Sub_quantity_amount'] ?></td>
                                                    <td><?= number_format(($price+$orderdetail['Product_vop'])*$orderdetail['Sub_quantity_amount'], 2, '.', ',') ?> MMK</td>
                                                    <td>-<?= number_format(($orderdetail['Product_price']*$orderdetail['Sub_quantity_amount'])-($price*$orderdetail['Sub_quantity_amount']), 2, '.', ',') ?> MMK</td> 
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="invoice-total-details" class="invoice-total-table">
                            <div class="row">
                                <div class="col-4">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th colspan="2"><h3 align="center">Shipping Type</h3></th>
                                                </tr>
                                                <tr>
                                                    <th>Shipping ID</th>
                                                    <td><?= $order['Shipping_id'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping Name</th>
                                                    <td><?= $order['Shipping_name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Per Order Price</th>
                                                    <td><?= number_format($order['Per_order_price'], 2, '.', ',') ?> MMK</td>
                                                </tr>
                                                <tr>
                                                    <th>Per Item Price</th>
                                                    <td><?= number_format($order['Per_item_price'], 2, '.', ',') ?> MMK</td>
                                                </tr>
                                                <tr>
                                                    <th>Per Weight Price</th>
                                                    <td><?= number_format($order['Per_weight_price'], 2, '.', ',') ?> MMK</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th colspan="2"><h3 align="center">Shipping Costs</h3></th>
                                                </tr>
                                                <tr>
                                                    <th>Shipping Order Price</th>
                                                    <td><?= number_format($order['Per_order_price'], 2, '.', ',') ?> MMK</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping Item Price</th>
                                                    <td><?= number_format($order['Per_item_price']*$order['Order_total_quantity_amount'], 2, '.', ',') ?> MMK</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping Weight Price</th>
                                                    <td><?= number_format($order['Per_weight_price']*$order['Order_total_weight_amount'], 2, '.', ',') ?> MMK</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping Total Price</th>
                                                    <?php $shippingtotalprice = $order['Per_order_price']+($order['Per_item_price']*$order['Order_total_quantity_amount'])+($order['Per_weight_price']*$order['Order_total_weight_amount']) ?>
                                                    <td><?= number_format($shippingtotalprice, 2, '.', ',') ?> MMK</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-7 offset-5">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th colspan="2"><h3 align="center">Net Amount</h3></th>
                                                </tr>
                                                <tr>
                                                    <th>Total You Saved From Discounts</th>
                                                    <td>-<?= number_format($order['Order_total_discount_amount'], 2, '.', ',') ?> MMK</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Price</th>
                                                    <td><?= number_format($order['Order_total_price_amount'], 2, '.', ',') ?> MMK</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Quantity</th>
                                                    <td><?= $order['Order_total_quantity_amount'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Weight</th>
                                                    <td><?= $order['Order_total_weight_amount'] ?> lb</td>
                                                </tr>
                                                <tr>
                                                    <th>TOTAL NET AMOUNT (Including Shipping Cost)</th>
                                                    <td><strong><?= number_format($shippingtotalprice+$order['Order_total_price_amount'], 2, '.', ',') ?> MMK</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Footer -->
                        <div id="invoice-footer" class="text-right pt-3">
                            <p>Thank you for shopping by! Please come again!
                                <p class="bank-details mb-0">
                                    <span>INVOICE NO: <strong><?= $order['Order_id'] ?></strong></span>
                                </p>
                                <p class="bank-details mb-0">
                                    <span>Payment Status: <strong><?php if ($order['Payment_status']==1) { echo "Paid"; } else { echo "Not Paid"; } ?></strong></span>
                                </p>
                        </div>
                        <!--/ Invoice Footer -->

                    </div>
                </section>
                <!-- invoice page end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php 
    include 'include/footer.php';
?>