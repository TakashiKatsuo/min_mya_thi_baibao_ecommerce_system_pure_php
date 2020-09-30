<?php 
    session_start();

    if (isset($_SESSION['user']) && $_SESSION['user']['User_approval']==1 && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER" || $_SESSION['user']['Role']=="SELLER")) {

	include 'dbconnection/dbconnect.php';
    include 'include/AutoID.php';

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
                            <h2 class="content-header-title float-left mb-0">Variant Add</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Variant Add
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <!-- Form start -->
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Variant Form</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form method="POST" action="variant_add.php" enctype="multipart/form-data" class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Code Number</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="Variant_id" value="<?= AutoID('variants','Variant_id','VARI_',4) ?>" class="form-control" required data-validation-required-message="This Code name field is required" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Variant Name</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="Variant_name" class="form-control" placeholder="Type the variant's name" required data-validation-required-message="This name field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Variant Description</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <textarea name="Variant_description" class="form-control" placeholder="Type the variant's description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Product</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <select name="Product_id" class="select2 form-control" required>
                                                                    <option value = "" selected hidden disabled>Choose product to add variant title...</option>
                                                                    <?php 
                                                                        $sql = "SELECT * FROM products";
                                                                        $stmt = $pdo->prepare($sql);
                                                                        $stmt->execute();
                                                                        $products=$stmt->fetchALL();
                                                                        foreach ($products as $product) {
                                                                    ?>

                                                                    <option value="<?= $product['Product_id'] ?>">Codeno: <?= $product['Product_id'] ?> / Name: <?= $product['Product_name'] ?></option>

                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-round btn-primary mr-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-round btn-outline-warning mr-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php 
    include 'include/footer.php';

    } else {

        header("location:page_not_authorized.php");
    }
?>