<?php 
    session_start();

    if (isset($_SESSION['user']) && $_SESSION['user']['User_approval']==1 && $_SESSION['user']['Role']!="CUSTOMER") {

    include 'dbconnection/dbconnect.php';
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
                            <h2 class="content-header-title float-left mb-0">Order List</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Order List
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                
                <!-- users list start -->
                <section class="users-list-wrapper">
                    <!-- Ag Grid users list section start -->
                    <div id="basic-examples">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover zero-configuration">
                                            <thead>
                                                <tr style="color: #ffffff; background: #a5783d;">
                                                    <th>Order No</th>
                                                    <th>Buyer ID</th>
                                                    <th>Order Date</th>
                                                    <th>Total Price</th>
                                                    <th>Total Discounts</th>
                                                    <th>Total Quantity</th>
                                                    <th>Total Weight</th>
                                                    <th>Order Address</th>
                                                    <th>Order Phone Number</th>
                                                    <th>Payment Status</th>
                                                    <th>Shipment Status</th>
                                                    <th>Order Cancel Status</th>
                                                    <th>Status Changed By</th>
                                                    <th>Remark</th>
                                                    <th>Detail</th>
                                                    <?php if (isset($_SESSION['user']) && ($_SESSION['user']['Role']!="SELLER" || $_SESSION['user']['Role']!="CUSTOMER")) { ?>
                                                        <th>Action</th>  
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    if (isset($_SESSION['user']) && ($_SESSION['user']['Role']=='ADMIN' || $_SESSION['user']['Role']=='MANAGER')) {
                                                        $sql = "SELECT orders.*, orders.created_at as otime FROM orders";
                                                    }

                                                    if (isset($_SESSION['user']) && $_SESSION['user']['Role']=='SELLER') {
                                                        $sql = "SELECT orderdetails.*, orders.*, orders.created_at as otime, products.* FROM orderdetails INNER JOIN orders ON orderdetails.Order_id=orders.Order_id INNER JOIN products ON orderdetails.Product_id=products.Product_id WHERE products.Seller_id='".$_SESSION['user']['User_id']."'";
                                                    }

                                                    if (isset($_SESSION['user']) && $_SESSION['user']['Role']=='SHIPPER') {
                                                        $sql = "SELECT orders.*, orders.created_at as otime, shippings.* FROM orders, shippings WHERE orders.Shipping_id=shippings.Shipping_id AND shippings.Shipping_provider_id = '".$_SESSION['user']['User_id']."'";
                                                    }

                                                    $stmt = $pdo->prepare($sql);
                                                    $stmt->execute();
                                                    $orderlists = $stmt->fetchAll();

                                                    foreach ($orderlists as $orderlist) {  
                                                ?> 
                                                <tr>
                                                    <td><?= $orderlist["Order_id"] ?></td>
                                                    <td><?= $orderlist['User_id'] ?></td>
                                                    <td><?= $orderlist['otime'] ?></td>
                                                    <td><?= number_format($orderlist["Order_total_price_amount"], 2, '.', ',') ?> MMK</td>
                                                    <td><?= number_format($orderlist["Order_total_discount_amount"], 2, '.', ',') ?> MMK</td>
                                                    <td><?= $orderlist["Order_total_quantity_amount"] ?></td>
                                                    <td><?= $orderlist["Order_total_weight_amount"] ?></td>
                                                    <td><?= $orderlist['O_address'] ?></td>
                                                    <td><?= $orderlist['O_phone_number'] ?></td>
                                                    
                                                    <td>
                                                        <?php if ($orderlist['Payment_status']==0) { ?>
                                                            <div class="badge badge-pill badge-glow badge-warning mr-1 mb-1">Not Yet Paid</div>
                                                        <?php } else { ?>
                                                            <div class="badge badge-pill badge-glow badge-success mr-1 mb-1">Paid</div>
                                                        <?php } ?>
                                                    </td>

                                                    <td>
                                                        <?php if ($orderlist['Shipment_status']==0) { ?>
                                                            <div class="badge badge-pill badge-glow badge-danger mr-1 mb-1">Not Yet Delivered</div>
                                                        <?php } else { ?>
                                                            <div class="badge badge-pill badge-glow badge-success mr-1 mb-1">Delivered</div>
                                                        <?php } ?>
                                                    </td>

                                                    <td>
                                                        <?php if ($orderlist['Order_cancel_status']==0) { ?>
                                                            <div class="badge badge-pill badge-glow badge-success mr-1 mb-1">Order Acknowledged</div>
                                                        <?php } else { ?>
                                                            <div class="badge badge-pill badge-glow badge-danger mr-1 mb-1">Order Canceled</div>
                                                        <?php } ?>
                                                    </td>

                                                    <td><?= $orderlist['Status_changed_by'] ?></td>
                                                    <td><?= $orderlist["Notes"] ?></td>

                                                    <td>
                                                        <a href="order_invoice_detail.php?orderid=<?= $orderlist['Order_id']?>" class="btn btn-round btn-info">Detail</a>
                                                    </td>

                                                <?php if (isset($_SESSION['user']) && ($_SESSION['user']['Role']!="SELLER" || $_SESSION['user']['Role']!="CUSTOMER")) { ?>
                                                        
                                                    <td>

                                                        <div class="btn-group" role="group">

                                                        <?php if (isset($_SESSION['user']) && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER" || $_SESSION['user']['Role']=="SHIPPER")) { ?>

                                                            <?php if ($orderlist['Payment_status']==0) { ?>
                                                                <a href="order_list_paid_status.php?orderid=<?= $orderlist['Order_id']?>" class="btn btn-round btn-success" onclick="return confirm('Are you sure <?= $orderlist['Order_id']?> is Paid?')"><i class="fa fa-check-circle"></i><i class="fa fa-money"></i></a>
                                                            <?php } else { ?>
                                                                <a href="order_list_not_paid_status.php?orderid=<?= $orderlist['Order_id']?>" class="btn btn-round btn-warning" onclick="return confirm('Are you sure <?= $orderlist['Order_id']?> is Not Paid?')"><i class="fa fa-times-circle"></i><i class="fa fa-money"></i></a> 
                                                            <?php } ?>

                                                        <?php } ?>

                                                        <?php if (isset($_SESSION['user']) && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER" || $_SESSION['user']['Role']=="SHIPPER")) { ?>

                                                            <?php if ($orderlist['Shipment_status']==0) { ?>
                                                                <a href="order_list_delivered_status.php?orderid=<?= $orderlist['Order_id']?>" class="btn btn-round btn-success" onclick="return confirm('Are you sure <?= $orderlist['Order_id']?> is Delivered?')"><i class="fa fa-check-circle"></i><i class="fa fa-truck"></i></a>
                                                            <?php } else { ?>
                                                                <a href="order_list_not_delivered_status.php?orderid=<?= $orderlist['Order_id']?>" class="btn btn-round btn-danger" onclick="return confirm('Are you sure <?= $orderlist['Order_id']?> is Not Yet Delivered?')"><i class="fa fa-times-circle"></i><i class="fa fa-truck"></i></a> 
                                                            <?php } ?>

                                                        <?php } ?>

                                                        <?php if (isset($_SESSION['user']) && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER")) { ?>

                                                            <?php if ($orderlist['Order_cancel_status']==0) { ?>
                                                                <a href="order_list_order_canceled_status.php?orderid=<?= $orderlist['Order_id']?>" class="btn btn-round btn-danger" onclick="return confirm('Are you sure you want to Cancel <?= $orderlist['Order_id']?> Order?')"><i class="fa fa-times-circle"></i><i class="fa fa-clipboard"></i></a>
                                                            <?php } else { ?>
                                                                <a href="order_list_order_not_canceled_status.php?orderid=<?= $orderlist['Order_id']?>" class="btn btn-round btn-success" onclick="return confirm('Are you sure you want to process <?= $orderlist['Order_id']?> Order Again?')"><i class="fa fa-check-circle"></i><i class="fa fa-clipboard"></i></a> 
                                                            <?php } ?>

                                                        <?php } ?>

                                                        </div>

                                                    </td>
                                                    <?php } ?>

                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div id="myGrid" class="aggrid ag-theme-material"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ag Grid users list section end -->
                </section>
                <!-- users list ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- Modal -->
    <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="show_detail">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-round btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php 
    include 'include/footer.php';

    } else {

        header("location:auth_login_form.php");
    }
?>


<!-- Script -->
<script>
    $(document).ready(function(){
        $(document).on('click', '.view_data', function(){  
            var Orderid = $(this).attr("id");  
            if(Orderid != ''){  
                $.ajax({  
                    url:"order_detail.php",  
                    method:"POST",  
                    data:{Orderid:Orderid},  
                    success:function(data){  
                        $('#show_detail').html(data);  
                        $('#dataModal').modal('show');  
                    }  
                });  
            }            
        });
    });
</script>