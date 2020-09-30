<?php 
    session_start();

    if (isset($_SESSION['user'])) {

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
                            <h2 class="content-header-title float-left mb-0">My Dashboard</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    
                </div>
            </div>
            <div class="content-body">

                <!-- Statistics card section start -->
                <section id="statistics-card">
                    <div class="row">
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-users text-warning font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(User_id) FROM users";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>

                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Users</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-users text-success font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(User_approval) FROM users WHERE User_approval=1";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>
                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">User Approved</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-users text-info font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(User_id) FROM users WHERE Role='MANAGER'";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>

                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Managers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-users text-info font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(User_approval) FROM users WHERE Role='MANAGER' AND User_approval=1";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>
                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Manager Approved</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-users text-danger font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(User_id) FROM users WHERE Role='SELLER'";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>

                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Sellers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-users text-danger font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(User_approval) FROM users WHERE Role='SELLER' AND User_approval=1";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>
                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Seller Approved</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-users text-success font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(User_id) FROM users WHERE Role='CUSTOMER'";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>

                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Customers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-users text-success font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(User_approval) FROM users WHERE Role='CUSTOMER' AND User_approval=1";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>
                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Customer Approved</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-users text-warning font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(User_id) FROM users WHERE Role='SHIPPER' ";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>

                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Shippers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-users text-warning font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(User_approval) FROM users WHERE Role='SHIPPER' AND User_approval=1";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>
                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Shipper Approved</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-shopping-bag text-danger font-medium-5"></i>
                                            </div>
                                        </div>
                                        <?php 

                                            $sql = "SELECT COUNT(Order_id) FROM orders";

                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute();
                                            $Total_numbers = $stmt->fetchColumn(); 
                                         ?>

                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Orders</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-cubes text-warning font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(Product_id) FROM products";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>
                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Products</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-cubes text-success font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(Status_approve) FROM products WHERE Status_approve=1";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>
                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Products Approved</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-truck text-warning font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(Order_id) FROM orders";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>
                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Orders</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-truck text-success font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(Shipment_status) FROM orders WHERE Shipment_status=1";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>
                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Orders Delivered</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-truck text-danger font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT COUNT(Order_cancel_status) FROM orders WHERE Order_cancel_status=1";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>
                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?></h2>
                                        <p class="mb-0 line-ellipsis">Order Canceled</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fa fa-money text-success font-medium-5"></i>
                                            </div>
                                            <?php 

                                                $sql = "SELECT SUM(Order_total_price_amount) FROM orders WHERE Shipment_status=1";

                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $Total_numbers = $stmt->fetchColumn(); 
                                             ?>
                                        </div>
                                        <h2 class="text-bold-700"><?= $Total_numbers ?> MMK</h2>
                                        <p class="mb-0 line-ellipsis">Total Incomes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Statistics Card section end-->
                


            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php 
    include 'include/footer.php';

    } else {

        header("location:auth_login_form.php");
    }
?>