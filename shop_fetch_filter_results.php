<?php 
	include 'backend/pages/dbconnection/dbconnect.php';

	if (isset($_POST['action'])) {

		$sql = "SELECT products.*, subcategories.*, categories.*, users.* FROM products INNER JOIN subcategories ON products.Subcategory_id=subcategories.Subcategory_id INNER JOIN categories ON subcategories.Category_id=categories.Category_id INNER JOIN users ON products.Seller_id=users.User_id WHERE products.Status_approve=1";


		if (isset($_POST['filterpricelow'])) {

            if (isset($_POST['category']) && isset($_POST['filterpricelow'])) {
            $category_filter = implode("','", $_POST['category']);
            $sql .= " AND categories.Category_id IN('".$category_filter."')"; }

            if (isset($_POST['subcategory']) && isset($_POST['filterpricelow'])) {
            $subcategory_filter = implode("','", $_POST['subcategory']);
            $sql .= " AND subcategories.Subcategory_id IN('".$subcategory_filter."')"; }

            if (isset($_POST['brand']) && isset($_POST['filterpricelow'])) {
            $brand_filter = implode("','", $_POST['brand']);
            $sql .= " AND products.Product_brand IN('".$brand_filter."')";  }

            if (isset($_POST['seller']) && isset($_POST['filterpricelow'])) {
            $seller_filter = implode("','", $_POST['seller']);
            $sql .= " AND products.Seller_id IN('".$seller_filter."')";  }

            $sql .= " ORDER BY products.Product_price ASC"; 

        }

        if (isset($_POST['filterpricehigh'])) {

            if (isset($_POST['category']) && isset($_POST['filterpricehigh'])) {
            $category_filter = implode("','", $_POST['category']);
            $sql .= " AND categories.Category_id IN('".$category_filter."')"; }

            if (isset($_POST['subcategory']) && isset($_POST['filterpricehigh'])) {
            $subcategory_filter = implode("','", $_POST['subcategory']);
            $sql .= " AND subcategories.Subcategory_id IN('".$subcategory_filter."')"; }

            if (isset($_POST['brand']) && isset($_POST['filterpricehigh'])) {
            $brand_filter = implode("','", $_POST['brand']);
            $sql .= " AND products.Product_brand IN('".$brand_filter."')";  }

            if (isset($_POST['seller']) && isset($_POST['filterpricehigh'])) {
            $seller_filter = implode("','", $_POST['seller']);
            $sql .= " AND products.Seller_id IN('".$seller_filter."')";  }

            $sql .= " ORDER BY products.Product_price DESC"; 

        }

        if (isset($_POST['filteroldest'])) {

            if (isset($_POST['category']) && isset($_POST['filteroldest'])) {
            $category_filter = implode("','", $_POST['category']);
            $sql .= " AND categories.Category_id IN('".$category_filter."')"; }

            if (isset($_POST['subcategory']) && isset($_POST['filteroldest'])) {
            $subcategory_filter = implode("','", $_POST['subcategory']);
            $sql .= " AND subcategories.Subcategory_id IN('".$subcategory_filter."')"; }

            if (isset($_POST['brand']) && isset($_POST['filteroldest'])) {
            $brand_filter = implode("','", $_POST['brand']);
            $sql .= " AND products.Product_brand IN('".$brand_filter."')";  }

            if (isset($_POST['seller']) && isset($_POST['filteroldest'])) {
            $seller_filter = implode("','", $_POST['seller']);
            $sql .= " AND products.Seller_id IN('".$seller_filter."')";  }

            $sql .= " ORDER BY products.created_at ASC"; 

        }


        if (isset($_POST['filterlatest'])) {

            if (isset($_POST['category']) && isset($_POST['filterlatest'])) {
            $category_filter = implode("','", $_POST['category']);
            $sql .= " AND categories.Category_id IN('".$category_filter."')"; }

            if (isset($_POST['subcategory']) && isset($_POST['filterlatest'])) {
            $subcategory_filter = implode("','", $_POST['subcategory']);
            $sql .= " AND subcategories.Subcategory_id IN('".$subcategory_filter."')"; }

            if (isset($_POST['brand']) && isset($_POST['filterlatest'])) {
            $brand_filter = implode("','", $_POST['brand']);
            $sql .= " AND products.Product_brand IN('".$brand_filter."')";  }

            if (isset($_POST['seller']) && isset($_POST['filterlatest'])) {
            $seller_filter = implode("','", $_POST['seller']);
            $sql .= " AND products.Seller_id IN('".$seller_filter."')";  }

            $sql .= " ORDER BY products.created_at DESC"; 

        }

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
	    $filter_results = $stmt->fetchAll();
	    $total_row = $stmt->rowCount();
	    $output = '';


	    if ($total_row > 0) {
		    	
		    	foreach ($filter_results as $filter_result) {
		    		
		    		$output .= '<div class="card ecommerce-card">
                            <div class="card-content">
                                <div class="item-img text-center">
                                    <a href="shop_choose_variant_form.php?productid='. $filter_result['Product_id'].'">
                                        <img class="img-fluid" src="'. str_replace("../","backend/", $filter_result['Product_image']) .'" alt="img-placeholder" width="250" height="230"></a>
                                </div>
                                <div class="card-body">
                                    <div class="item-wrapper">
                                        <div class="item-rating">
                                        </div>
                                        <div>
                                            <h6 class="item-price">';

                if ($filter_result['Product_discounted_price']) {

                	$output .=' '. number_format($filter_result['Product_discounted_price'], 2, '.', ',') .' MMK
                			<del>'. number_format($filter_result['Product_price'], 2, '.', ',') .' MMK</del>';  
                } else {
                    $output .= ' '. number_format($filter_result['Product_price'], 2, '.', ',') .' MMK';
                } 

                $output .= '</h6>
                				</div>
                                    </div>
                                    <div class="item-name">
                                        <a href="shop_choose_variant_form.php?productid='. $filter_result['Product_id'].'">'. $filter_result['Product_name'].'</a>
                                        <p class="item-company">By <span class="company-name">Seller: '. $filter_result['Fullname'].'</span></p>
                                    </div>
                                    <div>
                                        <p class="item-description">
                                            '. $filter_result['Product_description'].'
                                        </p>
                                    </div>
                                </div>
                                <div class="item-options text-center">
                                    <div class="item-wrapper">
                                        <div class="item-rating">
                                        </div>
                                        <div class="item-cost">
                                            <h6 class="item-price">';

                if ($filter_result['Product_discounted_price']) {

                	$output .=' '. number_format($filter_result['Product_discounted_price'], 2, '.', ',') .' MMK
                			<del>'. number_format($filter_result['Product_price'], 2, '.', ',') .' MMK</del>';  
                } else {
                    $output .= ' '. number_format($filter_result['Product_price'], 2, '.', ',') .' MMK';
                } 

                $output .= '</h6>
                				</div>
		                            </div>
			                            <a href="shop_choose_variant_form.php?productid='. $filter_result['Product_id'].'" class="cart"><i class="feather icon-shopping-cart"></i>Choose Variants</a>
			                        </div>
			                    </div>
			                </div>';     

		    	}
		    } else {
		    	$output = '<h3>No Data Found!</h3><img src="images/sad.gif" style="text-align: center; background: height: 150px;" />';

		    }

		    echo $output;

	}

?>