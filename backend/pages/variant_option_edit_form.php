<?php 
    session_start();

    if (isset($_SESSION['user']) && $_SESSION['user']['User_approval']==1 && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER" || $_SESSION['user']['Role']=="SELLER")) {

	include 'dbconnection/dbconnect.php';

    $id = $_POST['Variant_option_id'];

    $sql = "SELECT * FROM variant_options WHERE Variant_option_id=:id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $variantoption = $stmt->fetch(PDO::FETCH_ASSOC);

    $pid = $_POST['Product_id'];

    $sql1 = "SELECT p.*, subcate.* FROM products p, subcategories subcate WHERE p.Subcategory_id=subcate.Subcategory_id AND Product_id=:product_id";

    $stmt = $pdo->prepare($sql1);
    $stmt->bindParam(':product_id', $pid);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

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
                            <h2 class="content-header-title float-left mb-0">Variant Option Add</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Variant Option Add
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
                                <h4 class="card-title">Product Choosen</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>CodeNo</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" value="<?= $product['Product_id']?>" class="form-control" required data-validation-required-message="This Code name field is required" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Image</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <img src="<?= $product['Product_image'] ?>" height="250" width="280" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Brand</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" value="<?= $product['Product_brand']?>" class="form-control" required data-validation-required-message="This name field is required" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Name</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" value="<?= $product['Product_name']?>" class="form-control" required data-validation-required-message="This name field is required" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Price</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" step="any" value="<?= $product['Product_price']?>" class="form-control" required data-validation-required-message="This name field is required" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Discounted Price</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" step="any" value="<?= $product['Product_discounted_price']?>" class="form-control" required data-validation-required-message="This name field is required" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Weight</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" step="any" value="<?= $product['Product_weight']?>" class="form-control" required data-validation-required-message="This name field is required" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Description</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" required data-validation-required-message="This name field is required" readonly><?= $product['Product_description']?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Status Approval</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" value="<?php if ($product['Status_approve']==0) {
                                                            echo 'Not Yet Approved';
                                                        } else {
                                                            echo 'Approved'; }?>" class="form-control" required data-validation-required-message="This name field is required" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Subcategory</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" value="<?= $product['Subcategory_id']?>: <?= $product['Subcategory_name']?> " class="form-control" required data-validation-required-message="This Code name field is required" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Variant Option Form</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form method="POST" action="variant_option_edit.php" enctype="multipart/form-data" class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Code Number</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="Variant_option_id" value="<?= $variantoption['Variant_option_id'] ?>" class="form-control" required data-validation-required-message="This Code name field is required" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Variant Title</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <select name="Variant_id" class="select2 form-control" required>
                                                                    <option value = "" selected hidden disabled>Choose product's variant title to add variant option...</option>
                                                                    <?php 
                                                                        $sql1 = "SELECT * FROM variants WHERE Product_id=:product_id";
                                                                        $stmt = $pdo->prepare($sql1);
                                                                        $stmt->bindParam(':product_id', $pid);
                                                                        $stmt->execute();
                                                                        $variants=$stmt->fetchALL();
                                                                        foreach ($variants as $variant) {
                                                                    ?>

                                                                    <option value="<?= $variant['Variant_id'] ?>" <?php if ($variant['Variant_id']==$variantoption['Variant_id']) { echo "selected"; } ?> >Codeno: <?= $variant['Variant_id'] ?> / Name: <?= $variant['Variant_name'] ?></option>

                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Variant Option Name</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="Variant_option_name" value="<?= $variantoption['Variant_option_name'] ?>" class="form-control" placeholder="Type the variant option's name" required data-validation-required-message="This name field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Variant Option Description</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <textarea name="Variant_option_description" class="form-control" placeholder="Type the variant option's description"><?= $variantoption['Variant_option_description'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Variant Option Additional Price</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="number" step="any" name="Variant_option_additional_price" value="<?= $variantoption['Variant_option_additional_price'] ?>" class="form-control" placeholder="Type the variant option's additional price" required data-validation-required-message="This name field is required">
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