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
                            <h2 class="content-header-title float-left mb-0">Product List</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Product List
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

                                    <a href="product_add_form.php" class="btn btn-round btn-relief-success"><i class="fa fa-plus-circle"></i>Add New</a>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover zero-configuration">
                                            <thead>
                                                <tr style="color: #ffffff; background: #a5783d;">
                                                    <th>CodeNo</th>
                                                    <th>Image</th>
                                                    <th>Brand</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Discounted Price</th>
                                                    <th>Weight</th>
                                                    <th>Seller</th>
                                                    <th>Status Approve</th>
                                                    <th>Status Changed By</th>
                                                    <th>Detail</th> 
                                                    <th>Action</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    $sql = "SELECT p.*, subcat.* FROM products p, subcategories subcat WHERE p.Subcategory_id=subcat.Subcategory_id";
                                                    $stmt = $pdo->prepare($sql);
                                                    $stmt->execute();
                                                    $products = $stmt->fetchAll();

                                                    foreach ($products as $product) {  
                                                ?> 
                                                <tr>
                                                    <td><?= $product["Product_id"] ?></td>
                                                    <td><img src="<?= $product['Product_image']?>" height="60" width="75" class="img-thumbnail" /></td>
                                                    <td><?= $product['Product_brand'] ?></td>
                                                    <td><?= $product['Product_name'] ?></td>
                                                    <td><?= number_format($product['Product_price'], 2, '.', ',') ?> MMK</td>
                                                    <td><?= number_format($product['Product_discounted_price'], 2, '.', ',') ?> MMK</td>
                                                    <td><?= $product['Product_weight'] ?> lb</td>
                                                    <td><?= $product['Seller_id'] ?></td>

                                                    <td>
                                                        <?php if ($product['Status_approve']==1) { ?>
                                                            <div class="badge badge-pill badge-glow badge-success mr-1 mb-1">Approved</div>
                                                        <?php } else { ?>
                                                            <div class="badge badge-pill badge-glow badge-danger mr-1 mb-1">Not Yet Approved</div>
                                                        <?php } ?>     
                                                    </td>

                                                    <td><?= $product['Status_changed_by'] ?></td>

                                                    <td>
                                                        <button type="button" id="<?= $product['Product_id']?>" class="btn btn-round btn-info view_data" data-toggle="modal" data-target="#dataModal">Detail</button>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">

                                                        <?php if (isset($_SESSION['user']) && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER")): ?>

                                                        <?php if ($product['Status_approve']==0) { ?>

                                                            <a href="product_approve.php?productid=<?= $product['Product_id']?>" class="btn btn-round btn-success" onclick="return confirm('Are you sure you want to Approve <?= $product["Product_id"] ?>?')"><i class="fa fa-thumbs-up"></i></a>
                                                        <?php } else { ?>

                                                            <a href="product_unapprove.php?productid=<?= $product['Product_id']?>" class="btn btn-round btn-danger" onclick="return confirm('Are you sure you want to Unapprove <?= $product["Product_id"] ?>?')"><i class="fa fa-thumbs-down"></i></a>
                                                        <?php } ?>
                                                        
                                                        <?php endif ?>

                                                        <a href="product_edit_form.php?productid=<?= $product['Product_id']?>" class="btn btn-round btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                                        <a href="product_delete.php?productid=<?= $product['Product_id']?>" class="btn btn-round btn-danger" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-window-close"></i></a>

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
    <!-- <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Product Details</h5>
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
    </div> -->

    <!-- Modal -->
    <div class="modal fade text-left" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalScrollableTitle">Product Details</h4>
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
            var Productid = $(this).attr("id");  
            if(Productid != ''){  
                $.ajax({  
                    url:"product_detail.php",  
                    method:"POST",  
                    data:{Productid:Productid},  
                    success:function(data){  
                        $('#show_detail').html(data);  
                        $('#dataModal').modal('show');  
                    }  
                });  
            }            
        });
    });
</script>