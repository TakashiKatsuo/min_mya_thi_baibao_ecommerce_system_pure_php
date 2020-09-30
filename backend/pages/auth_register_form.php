<?php 
    session_start();
?>

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
    <title>Register Page - Baibao -</title>
    <link rel="apple-touch-icon" href="../images/Logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.png">
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet"> IS LOADING LONG WITHOUT INTERNET--> 

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
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
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/shake_on_error.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img src="../app-assets/images/pages/register.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Create Account</h4>
                                            </div>
                                        </div>

                                        <form action="auth_register.php" method="POST" enctype="multipart/form-data">
                                            <!-- Radio Buttons start -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <p>Firstly, Who Are You Gonna Be?</p>
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="vs-radio-con vs-radio-success">
                                                                                <input type="radio" name="Role" value="SELLER" onChange="userlevel(this)" checked>
                                                                                <span class="vs-radio">
                                                                                    <span class="vs-radio--border"></span>
                                                                                    <span class="vs-radio--circle"></span>
                                                                                </span>
                                                                                <span class="">SELLER</span>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="vs-radio-con vs-radio-success">
                                                                                <input type="radio" name="Role" value="SHIPPER" onChange="userlevel(this)">
                                                                                <span class="vs-radio">
                                                                                    <span class="vs-radio--border"></span>
                                                                                    <span class="vs-radio--circle"></span>
                                                                                </span>
                                                                                <span class="">SHIPPER</span>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="vs-radio-con vs-radio-success">
                                                                                <input type="radio" name="Role" value="CUSTOMER" onChange="userlevel(this)">
                                                                                <span class="vs-radio">
                                                                                    <span class="vs-radio--border"></span>
                                                                                    <span class="vs-radio--circle"></span>
                                                                                </span>
                                                                                <span class="">CUSTOMER</span>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['Role']=="ADMIN"): ?>
                                                                        <li class="d-inline-block mr-2">
                                                                            <fieldset>
                                                                                <div class="vs-radio-con vs-radio-success">
                                                                                    <input type="radio" name="Role" value="MANAGER" onChange="userlevel(this)">
                                                                                    <span class="vs-radio">
                                                                                        <span class="vs-radio--border"></span>
                                                                                        <span class="vs-radio--circle"></span>
                                                                                    </span>
                                                                                    <span class="">MANAGER</span>
                                                                                </div>
                                                                            </fieldset>
                                                                        </li>
                                                                    <?php endif ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Radio Buttons end -->

                                            <p class="px-2">Fill the below form to create a new account.</p>
                                            <div class="card-content">
                                                <div class="card-body pt-0">
                                                    <ul class="nav nav-pills nav-justified">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="profile-tab-justified" data-toggle="pill" href="#profile-justified" aria-expanded="false">Profile</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="home-tab-justified" data-toggle="pill" href="#home-justified" aria-expanded="true">Account Steps</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="about-tab-justified" data-toggle="pill" href="#about-justified" aria-expanded="false">Address</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab-justified" aria-expanded="false">
                                                            <fieldset class="form-group">
                                                                <label for="basicInputFile">Profile Photo</label>
                                                                <div class="custom-file">
                                                                    <input type="file" name="Photo" class="custom-file-input" id="inputGroupFile01">
                                                                    <label class="custom-file-label" for="inputGroupFile01">Choose profile photo</label>
                                                                </div>
                                                            </fieldset>
                                                            <div class="form-label-group">
                                                                <input type="text" name="Fullname" id="inputName" class="form-control" placeholder="Name" required>
                                                                <label for="inputName">Full Name</label>
                                                            </div>
                                                            <div class="form-label-group">
                                                                <input type="date" name="Dob" value="<?php echo date('Y-m-d') ?>" id="inputName" class="form-control" placeholder="Date of Birth" required>
                                                                <label for="inputName">Date of Birth</label>
                                                            </div>
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane" id="home-justified" aria-labelledby="home-tab-justified" aria-expanded="true">
                                                            <div class="form-label-group">
                                                                <input type="text" name="Username" id="inputName" class="form-control" placeholder="Username" required>
                                                                <label for="inputName">Username</label>
                                                            </div>
                                                            <div class="form-label-group">
                                                                <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email" required>
                                                                <label for="inputEmail">Email</label>
                                                            </div>
                                                            <div class="form-label-group">
                                                                <input type="password" name="Password" id="inputPassword" class="form-control" placeholder="Password" required>
                                                                <label for="inputPassword">Password</label>
                                                            </div>
                                                            <div class="form-label-group">
                                                                <input type="password" name="Passwordconfirm" id="inputConfPassword" class="form-control" placeholder="Confirm Password" required>
                                                                <label for="inputConfPassword">Confirm Password</label>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="about-justified" role="tabpanel" aria-labelledby="about-tab-justified" aria-expanded="false">
                                                            <div class="form-label-group">
                                                                <input type="text" name="Phone_number" id="phonenumber" class="form-control" placeholder="Phone Number" required>
                                                                <label for="phonenumber">Phone Number</label>
                                                            </div>
                                                            <div class="form-label-group">
                                                                <textarea name="Address" class="form-control" placeholder="Your Address"></textarea>
                                                                <label for="phonenumber">Address</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <fieldset class="form-group" id="crdetail" style="display: block;">
                                                        <p>Fill the below form for business account.</p>
                                                        <label for="basicInputFile">Company Name</label>
                                                        <div class="form-label-group">
                                                            <input type="text" name="Company" id="inputName" class="form-control" placeholder="Company" required>
                                                            <label for="inputName">Company Name</label>
                                                        </div>
                                                        <label for="basicInputFile">Commercial Registration Certificate Img File</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="CR_detail" class="custom-file-input" id="inputGroupFile01">
                                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </fieldset>
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" checked>
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class=""> I accept the terms & conditions.</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <a href="auth_login_form.php" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                                    <button type="submit" name="btnregister" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
    <script src="../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>



<script type="text/javascript">

  function userlevel(x) {
    if(x.value == 'SELLER' || x.value == 'SHIPPER'){
      document.getElementById("crdetail").style.display = 'block';
    } else {
      document.getElementById("crdetail").style.display = 'none';
    }
  }

</script>
