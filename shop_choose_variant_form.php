<?php 
    session_start();
    include 'backend/pages/dbconnection/dbconnect.php';

    $id = $_GET['productid'];

    $sql = "SELECT products.*, users.* FROM products INNER JOIN users ON products.Seller_id=users.User_id WHERE Product_id=:id";

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
                            <h2 class="content-header-title float-left mb-0">Product Details</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="index.php">Shop Products</a>
                                    </li>
                                    <li class="breadcrumb-item active">Choose Variant Options
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- app ecommerce details start -->
                <section class="app-ecommerce-details">
                    <div class="card">
                        <div class="card-body">

                            <!-- FORM FOR VARIANT -->
                            <form method="POST" action="shop_put_to_cart_form.php">

                                <div class="row mb-5 mt-2">
                                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="<?= str_replace("../","backend/", $product['Product_image']) ?>" class="img-fluid" alt="product image">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <h3><?= $product['Product_name'] ?>
                                        </h3>
                                        <p class="text-muted">by <?= $product['Fullname']?></p>
                                        <div class="ecommerce-details-price d-flex flex-wrap">
                                            <p class="text-primary font-medium-3 mr-1 mb-0">
                                                <?php if ($product['Product_discounted_price']) {
                                                            echo number_format($product['Product_discounted_price'], 2, '.', ','); ?>MMK
                                                    <del><?= number_format($product['Product_price'], 2, '.', ',') ?>MMK</del>
                                                        <?php } else { echo number_format($product['Product_price'], 2, '.', ','); ?>MMK <?php } ?>
                                            </p> 
                                        </div>
                                        <hr>
                                        <p><?= $product['Product_description']?></p>
                                        <p class="font-weight-bold mb-25"> <i class="feather icon-truck mr-50 font-medium-2"></i>Trustful Services
                                        </p>
                                        <p class="font-weight-bold"> <i class="feather icon-dollar-sign mr-50 font-medium-2"></i>User Friendly
                                        </p>
                                        <hr>
                                        <div class="form-group">

                                            <?php 

                                                $sql3 = "SELECT variants.*, products.* FROM variants INNER JOIN products ON variants.Product_id = products.Product_id WHERE variants.Product_id=:id";

                                                $stmt = $pdo->prepare($sql3);
                                                $stmt->bindParam(':id', $id);
                                                $stmt->execute();
                                                $variants = $stmt->fetchAll();

                                                foreach ($variants as $variant) { 

                                                    $vid = $variant['Variant_id']; ?>
                                                    
                                                    <h3><?= $variant['Variant_name'] ?></h3>
                                                    <input type="hidden" name="Variant_name" value="<?= $v['Variant_id']?>">

                                                    <ul class="list-unstyled mb-0">

                                                    <?php 

                                                        $sql4 = "SELECT variant_options.*, variants.* FROM variant_options INNER JOIN variants ON variant_options.Variant_id = variants.Variant_id WHERE variant_options.Variant_id=:vid";
                                                        $stmt = $pdo->prepare($sql4);
                                                        $stmt->bindParam(':vid', $vid);
                                                        $stmt->execute();
                                                        $vos = $stmt->fetchAll();

                                                        $variant_same =1;

                                                        foreach ($vos as $vo) { ?>

                                                                <li class="d-inline-block mr-2">
                                                                    <fieldset>
                                                                        <div class="vs-radio-con vs-radio-success">
                                                                            <input type="radio" name="<?= $variant['Variant_id']?>" value="<?= $vo['Variant_option_id']?>" <?php if ($variant_same==1) { ?> checked <?php } ?> >
                                                                            <span class="vs-radio">
                                                                                <span class="vs-radio--border"></span>
                                                                                <span class="vs-radio--circle"></span>
                                                                            </span>
                                                                            <span class=""><?= $vo['Variant_option_name'] ?></span>
                                                                        </div>
                                                                    </fieldset>
                                                                </li>

                                                                <!-- <input type="hidden" name="Variant_option_id" value="$vo['Variant_option_id']?>"> -->

                                                        <?php $variant_same++; } ?>

                                                    </ul>

                                                <?php } ?>

                                                <input type="hidden" name="Product_id" value="<?= $id ?>">
                                        </div>

                                        <hr>
                                        <!-- <p>Available - <span class="text-success">In stock</span></p> -->

                                        <div class="d-flex flex-column flex-sm-row">

                                            <!-- JS ADD TO CART -->
                                            <button type="submit" class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"><i class="feather icon-shopping-cart mr-25"></i>Pick This!</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="item-features py-5">
                            <div class="row text-center pt-2">
                                <div class="col-12 col-md-4 mb-4 mb-md-0 ">
                                    <div class="w-75 mx-auto">
                                        <i class="feather icon-award text-primary font-large-2"></i>
                                        <h5 class="mt-2 font-weight-bold">100% Original</h5>
                                        <p>Chocolate bar candy canes ice cream toffee. Croissant pie cookie halvah.</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4 mb-md-0">
                                    <div class="w-75 mx-auto">
                                        <i class="feather icon-clock text-primary font-large-2"></i>
                                        <h5 class="mt-2 font-weight-bold">10 Day Replacement</h5>
                                        <p>Marshmallow biscuit donut dragée fruitcake. Jujubes wafer cupcake.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4 mb-md-0">
                                    <div class="w-75 mx-auto">
                                        <i class="feather icon-shield text-primary font-large-2"></i>
                                        <h5 class="mt-2 font-weight-bold">1 Year Warranty</h5>
                                        <p>Cotton candy gingerbread cake I love sugar plum I love sweet croissant.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- app ecommerce details end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php 
    include 'include/footer.php';
?>