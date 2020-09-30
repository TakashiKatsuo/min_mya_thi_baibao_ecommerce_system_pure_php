<?php 
    session_start();

    if (isset($_SESSION['user']) && $_SESSION['user']['User_approval']==1 && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER" || $_SESSION['user']['Role']=="SELLER")) {

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
                            <h2 class="content-header-title float-left mb-0">Category List</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Category List
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

                                    <a href="category_add_form.php" class="btn btn-round btn-relief-success"><i class="fa fa-plus-circle"></i>Add New</a>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover zero-configuration">
                                            <thead>
                                                <tr style="color: #ffffff; background: #a5783d;">
                                                    <th>CodeNo</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Detail</th> 
                                                    <th>Action</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    $sql = "SELECT * FROM categories";
                                                    $stmt = $pdo->prepare($sql);
                                                    $stmt->execute();
                                                    $categories = $stmt->fetchAll();

                                                    foreach ($categories as $category) {  
                                                ?> 
                                                <tr>
                                                    <td><?= $category["Category_id"] ?></td>
                                                    <td><img src="<?= $category['Category_image']?>" height="60" width="75" class="img-thumbnail" /></td>
                                                    <td><?= $category['Category_name'] ?></td>
                                                    <td>
                                                        <button type="button" id="<?= $category['Category_id']?>" class="btn btn-round btn-info view_data" data-toggle="modal" data-target="#dataModal">Detail</button>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="category_edit_form.php?categoryid=<?= $category['Category_id']?>" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                                            <a href="category_delete.php?categoryid=<?= $category['Category_id']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-window-close"></i></a>
                                                        </div>
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Category Details</h5>
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
            var Categoryid = $(this).attr("id");  
            if(Categoryid != ''){  
                $.ajax({  
                    url:"category_detail.php",  
                    method:"POST",  
                    data:{Categoryid:Categoryid},  
                    success:function(data){  
                        $('#show_detail').html(data);  
                        $('#dataModal').modal('show');  
                    }  
                });  
            }            
        });
    });
</script>