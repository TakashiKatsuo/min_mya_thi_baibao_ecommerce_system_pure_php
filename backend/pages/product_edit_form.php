<?php 
    session_start();

    if (isset($_SESSION['user']) && $_SESSION['user']['User_approval']==1 && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER" || $_SESSION['user']['Role']=="SELLER")) {

	include 'dbconnection/dbconnect.php';
    
    $id = $_GET['productid'];

    $sql = "SELECT * FROM products WHERE Product_id=:id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
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
                            <h2 class="content-header-title float-left mb-0">Product Add</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Product Add
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
                                <h4 class="card-title">Product Form</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form method="POST" action="product_edit.php" enctype="multipart/form-data" class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Code Number</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="Product_id" value="<?= $product['Product_id'] ?>" class="form-control" required data-validation-required-message="This Code name field is required" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Product Image</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                           <label class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1 waves-effect waves-light cursor-pointer" for="image-upload"><i class="feather icon-image"></i></label>
                                                            <input type="file" id="image-upload" name="Product_image" hidden>
                                                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                size of
                                                                800kB</small></p>
                                                            <img src="<?= $product['Product_image'] ?>" height="100" width="120" class="img-thumbnail mt-3">
                                                            <input type="hidden" name="Product_old_image" value="<?= $product['Product_image'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Product Brand</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="Product_brand" value="<?= $product['Product_brand'] ?>"class="form-control" placeholder="Type the product's name" required data-validation-required-message="This name field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Product Name</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="Product_name" value="<?= $product['Product_name'] ?>"class="form-control" placeholder="Type the product's name" required data-validation-required-message="This name field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Product Price</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="number" step="any" name="Product_price" value="<?= $product['Product_price'] ?>" class="form-control" placeholder="Type the product's price" required data-validation-required-message="This name field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Product Discounted Price</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="number" step="any" name="Product_discounted_price" value="<?= $product['Product_discounted_price'] ?>" class="form-control" placeholder="(Optional*) Type the product's discounted price">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Product Weight</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="number" step="any" name="Product_weight" value="<?= $product['Product_weight'] ?>" class="form-control" placeholder="Type the product's weight" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Product Description</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <textarea name="Product_description" class="form-control" placeholder="Type the product's description"><?= $product['Product_description'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Subcategory</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <select name="Subcategory_id" class="select2 form-control" required>
                                                                    <?php 

                                                                        $sql = "SELECT * FROM subcategories";
                                                                        $stmt = $pdo->prepare($sql);
                                                                        $stmt->execute();
                                                                        $subcategories=$stmt->fetchALL();
                                                                        foreach ($subcategories as $subcategory) {
                                                                    ?>

                                                                    <option value="<?= $subcategory['Subcategory_id'] ?>" <?php if ($product['Subcategory_id']==$subcategory['Subcategory_id']) { echo "selected"; } ?> ><?= $subcategory['Subcategory_name'] ?></option>

                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- DO HERE FOR GETTING SELLER ID OR MANAGER ID WHO REQUEST THE PRODUCT -->
                                                <input type="hidden" name="">

                                                
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