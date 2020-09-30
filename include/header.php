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
    <link rel="apple-touch-icon" href="backend/images/Logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="backend/images/Logo2.png">
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet"> IS LOADING LONG WITHOUT INTERNET -->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="backend/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/vendors/css/extensions/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/vendors/css/extensions/toastr.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/plugins/extensions/noui-slider.min.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/pages/app-ecommerce-shop.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/pages/app-ecommerce-details.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="backend/app-assets/css/pages/invoice.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="backend/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="css/badge_cart_data_count.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu content-detached-left-sidebar ecommerce-application navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="content-detached-left-sidebar">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="index.php">
                        <img src="backend/images/Logo2.png" width="50" height="50">
                    </a></li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <!-- <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon feather icon-check-square"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon feather icon-mail"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon feather icon-calendar"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0" data-search="template-list">
                                    <ul class="search-list search-list-bookmark"></ul>
                                </div>
                            </li>
                        </ul> -->
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <!-- <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
                        </li> -->



                        <!-- <li class="nav-item"><a class="nav-link nav-link-label" href="shop_shopping_cart_form.php" id="count"><i class="ficon feather icon-shopping-cart"></i><span class="badge badge-pill badge-primary badge-up cart-item-count" id="item_count"></span></a>
                        </li> -->
                        <!-- <li><a href="checkout.php" class="smoothScroll" id="count">
                              <span class="p1 fa-stack has-badge" id="item_count">
                                   <i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse"></i>
                              </span>
                         Shopping Cart</a></li>

                         <li class="nav-item"><a href="shop_shopping_cart_form.php" class="av-link nav-link-label" id="count">
                              <span class="p1 badge badge-pill badge-warning badge-up" id="item_count">
                                   <i class="p3 ficon feather icon-shopping-cart fa-stack-1x xfa-inverse"></i>
                              </span>
                         Shopping Cart</a></li> -->

                         <li class="nav-item">
                            <a class="nav-link nav-link-label" href="shop_shopping_cart_form.php" id="count">
                                <span class="p1" id="item_count">
                                    <i class="ficon feather icon-shopping-cart"></i>
                                </span>
                            </a>
                        </li>

                        
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['User_approval']==1) { ?>
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
                                        <img class="round" src="<?= str_replace("../","backend/", $_SESSION['user']['Photo']) ?>" alt="avatar" height="40" width="40">
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="backend/pages/user_profile_edit_form.php"><i class="feather icon-user"></i> Edit Profile</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="backend/pages/auth_logout.php" onclick="return confirm('Are you sure to Logout?')"><i class="feather icon-power"></i> Logout</a>
                                </div>
                            </li>
                        <?php } else { ?>

                            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none">
                                        <span class="user-name text-bold-600">
                                           Guest        
                                        </span>
                                        <span class="user-status">
                                            Not Registered
                                        </span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="backend/pages/auth_login_form.php"><i class="feather icon-user-plus"></i> Login</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="backend/pages/auth_register_form.php"><i class="feather icon-user-check"></i> Register</a>
                                </div>
                            </li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php">
                            <img src="backend/images/Logo2.png" width="50" height="50">
                            <h2 class="brand-text mb-0">Baibao</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include backend/includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <!-- <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="index.html" data-toggle="dropdown"><i class="feather icon-home"></i><span data-i18n="Home">Home</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item" href="dashboard-analytics.html" data-toggle="dropdown" data-i18n="Analytics"><i class="feather icon-activity"></i>Analytics</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="dashboard-ecommerce.html" data-toggle="dropdown" data-i18n="eCommerce"><i class="feather icon-shopping-cart"></i>eCommerce</a>
                            </li>
                        </ul>
                    </li> -->
                    <a href="#" type="button" class="btn bg-gradient-info mx-1 my-1  nav-item"><i class="feather icon-home"></i><span data-i18n="Home">   Home</span></a>
                    <a href="index.php" type="button" class="btn bg-gradient-primary mx-1 my-1  nav-item"><i class="feather icon-package"></i><span data-i18n="Home">   Shopping Products</span></a>
                    <a href="#" type="button" class="btn bg-gradient-success mx-1 my-1  nav-item"><i class="feather icon-home"></i><span data-i18n="Home">   About us</span></a>
                    <a href="#" type="button" class="btn bg-gradient-warning mx-1 my-1  nav-item"><i class="feather icon-home"></i><span data-i18n="Home">   Contact us</span></a>

                    <!-- <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-package"></i><span data-i18n="Shopping Products">Shopping Products</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Ecommerce"><i class="feather icon-shopping-cart"></i>Ecommerce</a>
                                <ul class="dropdown-menu">
                                    <li class="active" data-menu=""><a class="dropdown-item" href="app-ecommerce-shop.html" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Shop</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->