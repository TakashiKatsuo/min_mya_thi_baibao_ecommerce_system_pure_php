<?php 
    session_start();

    if (isset($_SESSION['user']) && $_SESSION['user']['User_approval']==1) {

    include 'dbconnection/dbconnect.php';
    include 'include/header.php';
?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                            <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                            <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Information</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">

                                        <form action="user_profile_edit.php" method="POST" enctype="multipart/form-data">
                                            <!-- users edit account form start -->
                                            <div novalidate>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="media">
                                                            <a href="javascript: void(0);">
                                                                <img src="<?= $_SESSION['user']['Photo'] ?>" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                            </a>
                                                            <div class="media-body mt-75">
                                                                <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                    <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                                                    <input type="file" name="Photo" id="account-upload" hidden>
                                                                    <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                                                                </div>
                                                                <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                        size of
                                                                        800kB</small></p>
                                                                <input type="hidden" name="Photo_old_image" value="<?= $_SESSION['user']['Photo'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Username</label>
                                                                <input type="text" name="Username" value="<?= $_SESSION['user']['Username'];?>" class="form-control" placeholder="Username" required data-validation-required-message="This username field is required" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Name</label>
                                                                <input type="text" name="Fullname" value="<?= $_SESSION['user']['Fullname'];?>" class="form-control" placeholder="Name" required data-validation-required-message="This name field is required">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>E-mail</label>
                                                                <input type="email" name="Email" value="<?= $_SESSION['user']['Email'];?>" class="form-control" placeholder="Email" required data-validation-required-message="This email field is required" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">

                                                        <div class="form-group">
                                                            <?php 
                                                                if($_SESSION['user']['User_approval']==1) 
                                                                    { $status='Approved'; } else { $status='Not Approved';}
                                                            ?>
                                                            <label>Status</label>
                                                            <input type="text" value="<?= $status ?>" class="form-control"required data-validation-required-message="This field is required" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Role</label>
                                                            <input type="text" value="<?= $_SESSION['user']['Role'];?>" class="form-control"  required data-validation-required-message="This field is required" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Company</label>
                                                            <input type="text" class="form-control" value="<?= $_SESSION['user']['Company'];?>" placeholder="Company name" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                            Changes</button>
                                                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- users edit account form ends -->
                                        </div>
                                        <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                            <!-- users edit Info form start -->
                                            <div novalidate>
                                                <div class="row mt-1">
                                                    <div class="col-12 col-sm-6">
                                                        <h5 class="mb-1"><i class="feather icon-user mr-25"></i>Personal Information</h5>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label>Birth date</label>
                                                                        <input type="text" value="<?= $_SESSION['user']['Dob'];?>"  class="form-control birthdate-picker" required placeholder="Birth date" data-validation-required-message="This birthdate field is required" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Mobile</label>
                                                                <input type="text" name="Phone_number" value="<?= $_SESSION['user']['Phone_number'];?>" class="form-control" placeholder="Mobile number here..." data-validation-required-message="This mobile number is required" required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <h5 class="mb-1 mt-2 mt-sm-0"><i class="feather icon-map-pin mr-25"></i>Address</h5>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Address</label>
                                                                <textarea name="Address" class="form-control" placeholder="Your Address" required><?= $_SESSION['user']['Address'];?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                            Changes</button>
                                                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- users edit Info form ends -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

<?php 
    include 'include/footer.php';

    } else {

        header("location:page_not_authorized.php");
    }
?>