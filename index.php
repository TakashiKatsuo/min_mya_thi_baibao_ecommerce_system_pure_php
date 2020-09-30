<?php 
    session_start();
    include 'backend/pages/dbconnection/dbconnect.php';

    // Find out how many items are in the table
    $total = $pdo->query('
        SELECT
            COUNT(*)
        FROM
            products
    ')->fetchColumn();

    // How many items to list per page
    $limit = 12;

    // How many pages will there be
    $pages = ceil($total / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);


    // Prepare the paged query
    $stmt = $pdo->prepare('
        SELECT * FROM products WHERE Status_approve=1
        ORDER BY
            created_at
        LIMIT
            :limit
        OFFSET
            :offset
    ');

    // Bind the query params
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

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
                            <h2 class="content-header-title float-left mb-0">Shop Products</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Shop Products
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-detached content-right">
                <div class="content-body">
                    <!-- Ecommerce Content Section Starts -->
                    <section id="ecommerce-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ecommerce-header-items">
                                    <div class="result-toggler">
                                        <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
                                            <span class="navbar-toggler-icon d-block d-lg-none"><i class="feather icon-menu"></i></span>
                                        </button>
                                        <div class="search-results">
                                            <!-- 16285 results found -->
                                        </div>
                                    </div>
                                    <div class="view-options">
                                        <select class="price-options form-control" id="ecommerce-price-options">
                                            <option selected>Featured</option>
                                            <option value="1">Lowest</option>
                                            <option value="2">Highest</option>
                                        </select>
                                        <div class="view-btn-option">
                                            <button class="btn btn-white view-btn grid-view-btn active">
                                                <i class="feather icon-grid"></i>
                                            </button>
                                            <button class="btn btn-white list-view-btn view-btn">
                                                <i class="feather icon-list"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Ecommerce Content Section Starts -->
                    <!-- background Overlay when sidebar is shown  starts-->
                    <div class="shop-content-overlay"></div>
                    <!-- background Overlay when sidebar is shown  ends-->

                    <!-- Ecommerce Search Bar Starts -->
                    <section id="ecommerce-searchbar">
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <fieldset class="form-group position-relative">
                                    <input type="text" class="form-control search-product" id="iconLeft5" placeholder="Search here">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </section>
                    <!-- Ecommerce Search Bar Ends -->

                    <!-- Ecommerce Products Starts -->
                    <section id="ecommerce-products" class="grid-view filter_data">


                    </section>
                    <!-- Ecommerce Products Ends -->

                    <!-- Ecommerce Pagination Starts -->

                    <?php 

                        // The "back" link
                        $prevlink = ($page > 1) ? '<a href="index.php?page=' . ($page - 1) . '" class="page-link"><i class="feather icon-chevron-left"></i></a>' : '';

                        // The "back" link
                        $firstlink = ($page > 1) ? '<a href="index.php?page=1" class="page-link"><i class="feather icon-chevrons-left"></i></a>' : '';

                        // The "forward" link
                        $nextlink = ($page < $pages) ? '<a href="index.php?page=' . ($page + 1) . '" class="page-link"><i class="feather icon-chevron-right"></i></a>' : '';

                        // The "forward" link
                        $lastlink = ($page < $pages) ? '<a href="index.php?page=' . $pages . '" class="page-link"><i class="feather icon-chevrons-right"></i></a>' : '';

                     ?>
                     
                    <section id="ecommerce-pagination">
                        <div class="row">
                            <div class="col-sm-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-2">

                                        <?php echo '<li class="page-item">', $firstlink ,'</li>'; ?>

                                        <?php echo '<li class="page-item">', $prevlink ,'</li>'; ?>
                                        
                                        <?php echo '<li class="page-item active"> <a href="" class="page-link">Page  ', $page ,'</a></li>'; ?>

                                        <?php echo '<li class="page-item">', $nextlink ,'</li>'; ?>

                                        <?php echo '<li class="page-item">', $lastlink ,'</li>'; ?>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </section>
                    <!-- Ecommerce Pagination Ends -->

                </div>
            </div>
            <div class="sidebar-detached sidebar-left">
                <div class="sidebar">
                    <!-- Ecommerce Sidebar Starts -->
                    <div class="sidebar-shop" id="ecommerce-sidebar-toggler">

                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="filter-heading d-none d-lg-block">Filters</h6>
                            </div>
                        </div>
                        <span class="sidebar-close-icon d-block d-md-none">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="card">
                            <div class="card-body">


                                <div class="multi-range-price">
                                    <div class="multi-range-title pb-75">
                                        <h6 class="filter-title mb-0">Multi Range</h6>
                                    </div>
                                    <ul class="list-unstyled price-range" id="price-range">
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" class="common_selector filterlatest"  name="price-range" checked>
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">Latest</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" class="common_selector filteroldest"  name="price-range">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">Oldest</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio"  class="common_selector filterpricelow" name="price-range" >
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">Lower</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" class="common_selector filterpricehigh"  name="price-range">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">Higher</span>
                                            </span>
                                        </li>

                                    </ul>
                                </div>


                                <!-- Categories -->
                                <div class="brands">
                                    <div class="brand-title mt-1 pb-1">
                                        <h6 class="filter-title mb-0">Categories</h6>
                                    </div>
                                    <div class="brand-list" id="brands">
                                        <ul class="list-unstyled">

                                            <?php 

                                                $sql = "SELECT * FROM categories ORDER BY Category_name ASC";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $categories = $stmt->fetchAll();

                                                foreach ($categories as $category) { ?>

                                                <li class="d-flex justify-content-between align-items-center py-25">
                                                    <span class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" class="common_selector category" value="<?= $category['Category_id']?>">
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class=""><?= $category['Category_name']?></span>
                                                    </span>
                                                </li>

                                            <?php } ?>

                                        </ul>
                                    </div>
                                </div>
                                <!-- /Categories -->
                                <hr>

                                <!-- Subcategories -->
                                <div class="brands">
                                    <div class="brand-title mt-1 pb-1">
                                        <h6 class="filter-title mb-0">Subcategories</h6>
                                    </div>
                                    <div class="brand-list" id="brands">
                                        <ul class="list-unstyled">

                                            <?php 

                                                $sql = "SELECT * FROM subcategories ORDER BY Subcategory_name ASC";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $subcategories = $stmt->fetchAll();

                                                foreach ($subcategories as $subcategory) { ?>

                                                <li class="d-flex justify-content-between align-items-center py-25">
                                                    <span class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" class="common_selector subcategory" value="<?= $subcategory['Subcategory_id']?>">
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class=""><?= $subcategory['Subcategory_name']?></span>
                                                    </span>
                                                </li>

                                            <?php } ?>

                                        </ul>
                                    </div>
                                </div>
                                <!-- /Subcategories -->
                                <hr>

                                <!-- Brands -->
                                <div class="brands">
                                    <div class="brand-title mt-1 pb-1">
                                        <h6 class="filter-title mb-0">Brands</h6>
                                    </div>
                                    <div class="brand-list" id="brands">
                                        <ul class="list-unstyled">

                                            <?php 

                                                $sql = "SELECT DISTINCT Product_brand FROM products ORDER BY Product_brand ASC";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $products = $stmt->fetchAll();

                                                foreach ($products as $product) { ?>

                                                <li class="d-flex justify-content-between align-items-center py-25">
                                                    <span class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" class="common_selector brand" value="<?= $product['Product_brand']?>">
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class=""><?= $product['Product_brand']?></span>
                                                    </span>
                                                </li>

                                            <?php } ?>

                                        </ul>
                                    </div>
                                </div>
                                <!-- /Brands -->
                                <hr>

                                 <!-- Seller -->
                                <div class="brands">
                                    <div class="brand-title mt-1 pb-1">
                                        <h6 class="filter-title mb-0">Seller</h6>
                                    </div>
                                    <div class="brand-list" id="brands">
                                        <ul class="list-unstyled">

                                            <?php 

                                                $sql = "SELECT product_seller.*, users.User_id, users.Fullname FROM (SELECT DISTINCT Seller_id FROM products) product_seller, users WHERE users.User_id = product_seller.Seller_id ORDER BY users.Fullname ASC";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $sellers = $stmt->fetchAll();

                                                foreach ($sellers as $seller) { ?>

                                                <li class="d-flex justify-content-between align-items-center py-25">
                                                    <span class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" class="common_selector seller" value="<?= $seller['Seller_id']?>">
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class=""><?= $seller['Fullname']?></span>
                                                    </span>
                                                </li>

                                            <?php } ?>

                                        </ul>
                                    </div>
                                </div>
                                <!-- /Seller -->
                                <hr>

                                <!-- Clear Filters Starts -->
                                <div id="clear-filters">
                                    <button class="btn btn-block btn-primary">CLEAR ALL FILTERS</button>
                                </div>
                                <!-- Clear Filters Ends -->

                            </div>
                        </div>
                    </div>
                    <!-- Ecommerce Sidebar Ends -->

                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php 
    include 'include/footer.php';
?>


<style type="text/css">
    #loading {
        text-align: center;
        background: url('images/happy.gif') no-repeat center;
        height: 150px;
    }
</style>


<script type="text/javascript">
    $(document).ready(function() {

        filter_data();

        function filter_data() {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_filter_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var category = get_filter('category');
            var subcategory = get_filter('subcategory');
            var brand = get_filter('brand');
            var seller = get_filter('seller');
            var filterpricelow = get_filter('filterpricelow');
            var filterpricehigh = get_filter('filterpricehigh');
            var filterlatest = get_filter('filterlatest');
            var filteroldest = get_filter('filteroldest');

            $.ajax({
                url: "shop_fetch_filter_results.php",
                method: "POST",
                data:{
                    action:action,
                    minimum_price:minimum_price,
                    maximum_price:maximum_price,
                    category:category,
                    subcategory:subcategory,
                    brand:brand,
                    seller:seller,
                    filterpricelow:filterpricelow,
                    filterpricehigh:filterpricehigh,
                    filterlatest:filterlatest,
                    filteroldest:filteroldest
                },success:function(data){

                    $('.filter_data').html(data);
                }
            })

        }

        function get_filter(class_name) {
            var filter = [];
            $('.'+class_name+':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }

        $('.common_selector').click(function() {
            filter_data();
        });


        $('#search_text').keyup(function() {

            var txt = $(this).val();

            if(txt != '') {

                $.ajax({
                    url: "shop_fetch_filter_results.php",
                    method: "POST",
                    data: {search:txt
                    }, dataType: "text", success:function(data) {
                        $('.filter_data').html(data);
                    }
                })

            } else {

                $('.filter_data').html('');

                
            }
        })


        // $('#price_range').slider({
        //     range:true,
        //     min:0,
        //     max:10000000,
        //     values:[0,10000000],
        //     step:500,
        //     stop:function(event, ui) {
        //         $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
        //         $('#hidden_minimum_price').val(ui.values[0]);
        //         $('#hidden_maximum_price').val(ui.values[1]);
        //         filter_data();
        //     }
        // });


    })
    
</script>