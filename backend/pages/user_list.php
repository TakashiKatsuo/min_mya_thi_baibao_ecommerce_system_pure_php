<?php 
    session_start();

    if (isset($_SESSION['user']) && $_SESSION['user']['User_approval']==1 && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER")) {

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
                            <h2 class="content-header-title float-left mb-0">User List</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">User List
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                        <div class="form-group breadcrum-right">
                            
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


                                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['Role']=="ADMIN"): ?>
                                        
                                        <a href="auth_register_form.php" class="btn btn-round btn-relief-success"><i class="fa fa-user-plus"></i> Register New Member</a>

                                    <?php endif ?>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover zero-configuration">
                                            <thead>
                                                <tr style="color: #ffffff; background: #a5783d;">
                                                    <th>User ID</th>
                                                    <th>Role</th>
                                                    <th>Photo</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Status Approval</th>
                                                    <th>Status Changed By</th>
                                                    <th>Detail</th>
                                                    <th>Action</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  

                                                    if (isset($_SESSION['user']) && $_SESSION['user']['Role']=='ADMIN') {
                                                        $sql = "SELECT * FROM users WHERE User_id != '".$_SESSION['user']['User_id']."'";
                                                    } else {
                                                        $sql = "SELECT * FROM users WHERE Role != '".$_SESSION['user']['Role']."' AND Role != 'ADMIN'";
                                                    }
                                                    $stmt = $pdo->prepare($sql);
                                                    $stmt->execute();
                                                    $users = $stmt->fetchAll();

                                                    foreach ($users as $user) {  
                                                ?> 
                                                <tr>
                                                    <td><?= $user["User_id"] ?></td>
                                                    <td><?= $user["Role"] ?></td>
                                                    <td><img src="<?= $user['Photo']?>" height="60" width="75" class="img-thumbnail" /></td>
                                                    <td><?= $user['Fullname'] ?></td>
                                                    <td><?= $user['Email'] ?></td>
                                                    <td><?= $user['Phone_number'] ?></td>
                                                    <td>
                                                        <?php if ($user['User_approval']==1) { ?>
                                                            <div class="badge badge-pill badge-glow badge-success mr-1 mb-1">Approved</div>
                                                        <?php } else { ?>
                                                            <div class="badge badge-pill badge-glow badge-danger mr-1 mb-1">Not Yet Approved</div>
                                                        <?php } ?>     
                                                    </td>

                                                    <td><?= $user['Status_changed_by'] ?></td>
                                                    <td>
                                                        <button type="button" id="<?= $user['User_id']?>" class="btn btn-round btn-info view_data" data-toggle="modal" data-target="#dataModal">Detail</button>
                                                    </td>
                                                    <td>
                                                        <?php if ($user['User_approval']==0) { ?>

                                                            <a href="user_approve.php?userid=<?= $user['User_id']?>" class="btn btn-round btn-success" onclick="return confirm('Are you sure you want to Approve <?= $user["User_id"] ?>?')">Approve it</a>
                                                        <?php } else { ?>

                                                            <a href="user_unapprove.php?userid=<?= $user['User_id']?>" class="btn btn-round btn-danger" onclick="return confirm('Are you sure you want to Unapprove <?= $user["User_id"] ?>?')">Unapprove it</a>
                                                        <?php } ?>
                                                    </td>
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">User Details</h5>
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

        header("location:page_not_authorized.php");
    }
?>

<!-- Script -->
<script>
    $(document).ready(function(){
        $(document).on('click', '.view_data', function(){  
            var Userid = $(this).attr("id");  
            if(Userid != ''){  
                $.ajax({  
                    url:"user_detail.php",  
                    method:"POST",  
                    data:{Userid:Userid},  
                    success:function(data){  
                        $('#show_detail').html(data);  
                        $('#dataModal').modal('show');  
                    }  
                });  
            }            
        });
    });
</script>