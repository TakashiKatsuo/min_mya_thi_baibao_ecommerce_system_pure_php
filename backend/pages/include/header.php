<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Baibao Online Shopping System (Frontend & Backend System)">
    <meta name="keywords" content="Baibao Online Shopping System">
    <meta name="author" content="BAIBAO">
    <title>Shop - Baibao -</title>
    <link rel="apple-touch-icon" href="../images/Logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.png">
   <!--  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet"> IS LOADING LONG WITHOUT INTERNET--> 

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/charts/apexcharts.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/extensions/noui-slider.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/app-ecommerce-shop.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/app-ecommerce-details.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/invoice.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                    </div>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['User_approval']==1) { ?>
                        <ul class="nav navbar-nav float-right">
                            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none">
                                        <span class="user-name text-bold-600">
                                            <?= $_SESSION['user']['Fullname']?>        
                                        </span>
                                        <span class="user-status">
                                            Available
                                        </span>
                                    </div>
                                    <span>
                                        <img class="round" src="<?= $_SESSION['user']['Photo']?>" alt="avatar" height="40" width="40">
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user_profile_edit_form.php"><i class="feather icon-user"></i> Edit Profile</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="auth_logout.php" onclick="return confirm('Are you sure to Logout?')"><i class="feather icon-power"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php">
                        <img src="../images/Logo2.png" width="50" height="50">
                        <h2 class="brand-text mb-0">Baibao</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="index.php"><i class="feather icon-home"></i><span class="menu-title" data-i18n="My Dashboard">My Dashboard</span></a>
                </li>

                <?php if (isset($_SESSION['user']) && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER")) { ?>

                <li class=" navigation-header"><span> Users &amp; Controls</span></li>
                <li class=" nav-item">
                    <a href="user_list.php"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User Management">User Management</span></a>
                </li>
                <?php } ?>

                <?php if (isset($_SESSION['user']) && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER" || $_SESSION['user']['Role']=="SELLER")) { ?>

                <li class=" navigation-header"><span> Information &amp; Controls</span></li>
                <li class=" nav-item">
                    <a href="category_list.php"><i class="fa fa-codepen"></i><span class="menu-title" data-i18n="Category">Category</span></a>
                </li>
                <li class=" nav-item">
                    <a href="subcategory_list.php"><i class="fa fa-connectdevelop"></i><span class="menu-title" data-i18n="Subcategory">Subcategory</span></a>
                </li>
                <li class=" nav-item">
                    <a href="product_list.php"><i class="fa fa-cubes"></i><span class="menu-title" data-i18n="Product">Product</span></a>
                </li>
                <li class=" nav-item">
                    <a href="variant_list.php"><i class="fa fa-cubes"></i><span class="menu-title" data-i18n="Variant">Variant</span></a>
                </li>
                <li class=" nav-item">
                    <a href="variant_option_list.php"><i class="fa fa-cubes"></i><span class="menu-title" data-i18n="ariant Option">Variant Option</span></a>
                </li>
                <?php } ?>

                <?php if (isset($_SESSION['user']) && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER" || $_SESSION['user']['Role']=="SHIPPER")) { ?>

                <li class=" navigation-header"><span> Shippings &amp; Controls</span></li>
                <li class=" nav-item">
                    <a href="shipping_list.php"><i class="feather icon-layout"></i><span class="menu-title" data-i18n="Shipping">Shipping</span></a>
                </li>
                <?php } ?>

                <?php if (isset($_SESSION['user']) && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER" || $_SESSION['user']['Role']=="SHIPPER" || $_SESSION['user']['Role']=="SELLER")) { ?>

                <li class=" navigation-header"><span> Orders &amp; Controls</span></li>
                <li class=" nav-item">
                    <a href="order_list.php"><i class="feather icon-layout"></i><span class="menu-title" data-i18n="Order">Order</span></a>
                </li>
                <?php } ?>
                <!-- NavMenu -->

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->